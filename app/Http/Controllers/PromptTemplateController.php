<?php

namespace App\Http\Controllers;

use App\Models\PromptTemplate;
use App\Models\PromptCategory;
use App\Models\AiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromptTemplateController extends Controller
{
    public function index(Request $request)
    {
        $query = PromptTemplate::with(['category', 'aiModel', 'tags', 'user'])
                              ->public();

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $category = PromptCategory::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Filter by tags
        if ($request->has('tags')) {
            $tags = explode(',', $request->tags);
            $query->whereHas('tags', function($q) use ($tags) {
                $q->whereIn('name', $tags);
            });
        }

        // Filter by AI model
        if ($request->has('ai_model')) {
            $aiModel = AiModel::where('model_identifier', $request->ai_model)->first();
            if ($aiModel) {
                $query->where('ai_model_id', $aiModel->id);
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
                $query->orderBy('total_likes', 'desc');
            }
        } else {
            $query->popular();
        }

        $perPage = $request->has('per_page') ? $request->per_page : 20;
        $promptTemplates = $query->paginate($perPage);

        return response()->json([
            'prompt_templates' => $promptTemplates,
            'filters' => $request->all()
        ]);
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