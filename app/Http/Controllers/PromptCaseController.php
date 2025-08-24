<?php

namespace App\Http\Controllers;

use App\Models\PromptCase;
use App\Models\Category;
use App\Models\PromptCaseTag;
use App\Models\PromptCaseUsageStat;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PromptCaseController extends Controller
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
            $query->whereHas('tags', function ($q) use ($tags) {
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

    public function create()
    {
        $categories = Category::all();
        $teams = Team::all();
        $tags = PromptCaseTag::all();

        return view('prompt_case.create', compact('categories', 'teams', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'color' => 'nullable|string|max:20',
            'is_favorite' => 'boolean',
            'tags' => 'array',
            'tags.*' => 'exists:prompt_tags,id',
            'shared_teams' => 'array',
            'shared_teams.*' => 'exists:teams,id',
            'permission_level' => 'array',
            'permission_level.*' => 'in:read,edit'
        ]);

        DB::transaction(function () use ($validated, $request) {
            $prompt = PromptCase::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'category_id' => $validated['category_id'],
                'color' => $validated['color'] ?? '#1e87f0',
                'is_favorite' => $validated['is_favorite'] ?? false,
                'user_id' => Auth::id()
            ]);

            // Attach tags
            if (isset($validated['tags'])) {
                $prompt->tags()->attach($validated['tags']);
            }

            // Share with teams
            if (isset($validated['shared_teams'])) {
                $teamData = [];
                foreach ($validated['shared_teams'] as $teamId) {
                    $teamData[$teamId] = [
                        'permission_level' => $validated['permission_level'][$teamId] ?? 'read',
                        'shared_by' => Auth::id()
                    ];
                }
                $prompt->teams()->attach($teamData);
            }
        });

        return redirect()->route('prompt_case.index')
            ->with('success', 'پیشنهاد با موفقیت ایجاد شد.');
    }

    public function edit(PromptCase $prompt)
    {
        // $this->authorize('update', $prompt);

        $categories = Category::all();
        $teams = Team::all();
        $tags = PromptCaseTag::all();

        return view('prompt_case.edit', compact('prompt', 'categories', 'teams', 'tags'));
    }

    public function update(Request $request, PromptCase $prompt)
    {
        // $this->authorize('update', $prompt);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'color' => 'nullable|string|max:20',
            'is_favorite' => 'boolean',
            'tags' => 'array',
            'tags.*' => 'exists:prompt_tags,id',
            'shared_teams' => 'array',
            'shared_teams.*' => 'exists:teams,id',
            'permission_level' => 'array',
            'permission_level.*' => 'in:read,edit'
        ]);

        DB::transaction(function () use ($validated, $prompt) {
            $prompt->update([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'category_id' => $validated['category_id'],
                'color' => $validated['color'],
                'is_favorite' => $validated['is_favorite'] ?? false
            ]);

            // Sync tags
            if (isset($validated['tags'])) {
                $prompt->tags()->sync($validated['tags']);
            }

            // Sync teams with permissions
            if (isset($validated['shared_teams'])) {
                $teamData = [];
                foreach ($validated['shared_teams'] as $teamId) {
                    $teamData[$teamId] = [
                        'permission_level' => $validated['permission_level'][$teamId] ?? 'read',
                        'shared_by' => Auth::id()
                    ];
                }
                $prompt->teams()->sync($teamData);
            }
        });

        return redirect()->route('prompt_case.index')
            ->with('success', 'پیشنهاد با موفقیت بروزرسانی شد.');
    }

    public function destroy(PromptCase $prompt)
    {
        // $this->authorize('delete', $prompt);

        $prompt->delete();

        return redirect()->route('prompt_case.index')
            ->with('success', 'پیشنهاد با موفقیت حذف شد.');
    }

    public function toggleFavorite(PromptCase $prompt)
    {
        // $this->authorize('update', $prompt);

        $prompt->update([
            'is_favorite' => !$prompt->is_favorite
        ]);

        return response()->json([
            'is_favorite' => $prompt->is_favorite
        ]);
    }

    public function incrementUsage(PromptCase $prompt)
    {
        $user = Auth::user();

        $usageStat = PromptCaseUsageStat::firstOrNew([
            'prompt_id' => $prompt->id,
            'user_id' => $user->id
        ]);

        $usageStat->usage_count += 1;
        $usageStat->last_used_at = now();
        $usageStat->save();

        return response()->json([
            'usage_count' => $usageStat->usage_count
        ]);
    }
}
