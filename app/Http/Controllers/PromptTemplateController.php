<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PromptTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromptTemplateController extends Controller
{
    public function index(Request $request)
    {
        // Get active top-level categories
        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        $perPage = 20;

        $query = PromptTemplate::query();

        $currentCategory = null;

        // Filter by category slug
        if ($request->filled('category') && $request->category !== 'all') {
            $categoryName = str_replace('-', ' ', $request->category);
            $categoryName = ucwords($categoryName);

            $currentCategory = Category::where('name', $categoryName)->first();
            if ($currentCategory) {
                $query->where('category_id', $currentCategory->id);
            } else {
                $query->whereRaw('1=0');
            }
        }

        // Time filter implementation
        if ($request->filled('time_filter')) {
            switch ($request->time_filter) {
                case '24h':
                    $query->where('created_at', '>=', now()->subDay());
                    break;
                case 'week':
                    $query->where('created_at', '>=', now()->subWeek());
                    break;
                case 'month':
                    $query->where('created_at', '>=', now()->subMonth());
                    break;
            }
        }

        // Sort options implementation
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'top_rated':
                    // Assuming you have a 'rating' column or relationship
                    $query->orderBy('total_rates', 'desc');
                    break;
                case 'popular':
                    // Assuming you have a 'views' or 'popularity' column
                    $query->orderBy('total_views', 'desc');
                    break;
                case 'most_viewed':
                default:
                    $query->orderBy('total_likes', 'desc');
                    break;
            }
        } else {
            // Default sort by most viewed
            $query->orderBy('created_at', 'desc');
        }

        $images = $query->paginate($perPage)->withQueryString();

        $currentTimeFilter = $request->input('time_filter', 'all');
        $currentSort = $request->input('sort', 'most_viewed');

        return view('prompt_templates.index', compact(
            'images',
            'categories',
            'currentCategory',
            'currentTimeFilter',
            'currentSort'
        ));
    }


    public function show($id)
    {
        $promptTemplate = PromptTemplate::with(['category', 'aiModel', 'tags', 'user', 'media'])
            ->public()
            ->findOrFail($id);

        // Record view
        $promptTemplate->increment('total_views');
        PromptTemplateView::create([
            'prompt_template_id' => $id,
            'user_id' => auth()->id(),
            'user_ip' => request()->ip()
        ]);

        return response()->json(['prompt_template' => $promptTemplate]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'ai_model_id' => 'required|exists:ai_models,id',
            'category_id' => 'required|exists:prompt_categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:100',
            'is_public' => 'boolean'
        ]);

        try {
            DB::beginTransaction();

            $promptTemplate = PromptTemplate::create([
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'content' => $validated['content'],
                'ai_model_id' => $validated['ai_model_id'],
                'category_id' => $validated['category_id'],
                'user_id' => auth()->id(),
                'is_public' => $validated['is_public'] ?? false
            ]);

            // Add tags
            if (!empty($validated['tags'])) {
                $promptTemplate->attachTags($validated['tags']);
            }

            DB::commit();

            return response()->json([
                'message' => 'Prompt template created successfully',
                'prompt_template' => $promptTemplate->load(['category', 'aiModel', 'tags'])
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to create prompt template',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function like($id)
    {
        $promptTemplate = PromptTemplate::public()->findOrFail($id);
        $user = auth()->user();

        // Check if user already liked this prompt template
        $existingLike = $promptTemplate->interactions()
            ->where('user_id', $user->id)
            ->where('interaction_type', 'LIKE')
            ->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $promptTemplate->decrement('total_likes');
            $message = 'Prompt template unliked successfully';
        } else {
            // Like
            $promptTemplate->interactions()->create([
                'user_id' => $user->id,
                'interaction_type' => 'LIKE'
            ]);
            $promptTemplate->increment('total_likes');
            $message = 'Prompt template liked successfully';
        }

        return response()->json([
            'message' => $message,
            'total_likes' => $promptTemplate->total_likes
        ]);
    }
}
