<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Models\Category;
use App\Models\AiModel;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromptController extends Controller
{
    public function index(Request $request)
    {
        $query = Prompt::with(['category', 'model', 'primaryImage', 'tags'])
                      ->public();

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Filter by time
        if ($request->has('time_filter')) {
            $timeFilter = $request->time_filter;
            if ($timeFilter == 'day') {
                $query->where('created_at', '>=', now()->subDay());
            } elseif ($timeFilter == 'week') {
                $query->where('created_at', '>=', now()->subWeek());
            } elseif ($timeFilter == 'month') {
                $query->where('created_at', '>=', now()->subMonth());
            }
        }

        // Sort options
        if ($request->has('sort')) {
            $sort = $request->sort;
            if ($sort == 'popular') {
                $query->popular();
            } elseif ($sort == 'recent') {
                $query->recent();
            } elseif ($sort == 'likes') {
                $query->orderBy('likes_count', 'desc');
            }
        } else {
            $query->popular();
        }

        $perPage = $request->has('per_page') ? $request->per_page : 20;
        $prompts = $query->paginate($perPage);

        return response()->json([
            'prompts' => $prompts,
            'filters' => [
                'category' => $request->category ?? 'all',
                'time_filter' => $request->time_filter ?? 'all',
                'sort' => $request->sort ?? 'popular'
            ]
        ]);
    }

    public function show($id)
    {
        $prompt = Prompt::with(['category', 'model', 'images', 'tags', 'user'])
                       ->public()
                       ->findOrFail($id);

        // Increment view count
        $prompt->increment('views_count');

        return response()->json(['prompt' => $prompt]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'prompt_text' => 'required|string',
            'negative_prompt' => 'nullable|string',
            'model_id' => 'required|exists:ai_models,id',
            'category_id' => 'required|exists:categories,id',
            'width' => 'nullable|integer',
            'height' => 'nullable|integer',
            'seed' => 'nullable|integer',
            'steps' => 'nullable|integer',
            'cfg_scale' => 'nullable|numeric',
            'sampler' => 'nullable|string|max:100',
            'tags' => 'nullable|array',
            'images' => 'required|array',
            'images.*.image_url' => 'required|url',
            'images.*.thumbnail_url' => 'nullable|url',
            'images.*.file_size' => 'nullable|integer',
            'images.*.file_format' => 'nullable|string|max:10',
            'images.*.aspect_ratio' => 'nullable|string|max:10',
            'images.*.generation_time' => 'nullable|integer'
        ]);

        try {
            DB::beginTransaction();

            // Create prompt
            $prompt = Prompt::create([
                'title' => $validated['title'],
                'prompt_text' => $validated['prompt_text'],
                'negative_prompt' => $validated['negative_prompt'] ?? null,
                'model_id' => $validated['model_id'],
                'category_id' => $validated['category_id'],
                'user_id' => auth()->id(),
                'width' => $validated['width'] ?? 512,
                'height' => $validated['height'] ?? 512,
                'seed' => $validated['seed'] ?? null,
                'steps' => $validated['steps'] ?? 20,
                'cfg_scale' => $validated['cfg_scale'] ?? 7.5,
                'sampler' => $validated['sampler'] ?? null,
            ]);

            // Add tags
            if (!empty($validated['tags'])) {
                $tagIds = [];
                foreach ($validated['tags'] as $tagName) {
                    $tag = Tag::firstOrCreate(
                        ['name' => $tagName],
                        ['slug' => \Illuminate\Support\Str::slug($tagName)]
                    );
                    $tagIds[] = $tag->id;
                }
                $prompt->tags()->sync($tagIds);
            }

            // Add images
            $images = [];
            foreach ($validated['images'] as $index => $imageData) {
                $isPrimary = $index === 0; // First image is primary
                $images[] = [
                    'prompt_id' => $prompt->id,
                    'image_url' => $imageData['image_url'],
                    'thumbnail_url' => $imageData['thumbnail_url'] ?? $imageData['image_url'],
                    'file_size' => $imageData['file_size'] ?? null,
                    'file_format' => $imageData['file_format'] ?? 'jpg',
                    'aspect_ratio' => $imageData['aspect_ratio'] ?? '1:1',
                    'is_primary' => $isPrimary,
                    'generation_time' => $imageData['generation_time'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('generated_images')->insert($images);

            DB::commit();

            return response()->json([
                'message' => 'Prompt created successfully',
                'prompt' => $prompt->load(['category', 'model', 'images', 'tags'])
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to create prompt',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function like($id)
    {
        $prompt = Prompt::public()->findOrFail($id);
        $user = auth()->user();

        // Check if user already liked this prompt
        $existingLike = $prompt->interactions()
                              ->where('user_id', $user->id)
                              ->where('interaction_type', 'like')
                              ->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $prompt->decrement('likes_count');
            $message = 'Prompt unliked successfully';
        } else {
            // Like
            $prompt->interactions()->create([
                'user_id' => $user->id,
                'interaction_type' => 'like'
            ]);
            $prompt->increment('likes_count');
            $message = 'Prompt liked successfully';
        }

        return response()->json([
            'message' => $message,
            'likes_count' => $prompt->likes_count
        ]);
    }

    public function download($id)
    {
        $prompt = Prompt::public()->findOrFail($id);
        
        // Record download
        $prompt->interactions()->create([
            'user_id' => auth()->id(),
            'interaction_type' => 'download'
        ]);
        
        $prompt->increment('downloads_count');

        return response()->json([
            'message' => 'Download recorded successfully',
            'downloads_count' => $prompt->downloads_count
        ]);
    }
}