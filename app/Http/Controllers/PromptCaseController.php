<?php

namespace App\Http\Controllers;

use App\Models\AIModel;
use App\Models\PromptCase;
use App\Models\Category;
use App\Models\PromptCaseUsageStat;
use App\Models\Tag;
use App\Models\UserPrompt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PromptCaseController extends Controller
{
    // Add relationships to avoid N+1 queries
    public function index(Request $request)
    {
        $tags = Tag::all();
        $ai_models = AIModel::all();
        $categories = Category::all();
        $userPrompts = UserPrompt::byUser(Auth::id())
            ->with('category')
            ->paginate(10);

        return view('prompt_case.index', compact('tags', 'ai_models', 'userPrompts', 'categories'));
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'content' => 'required|string',
        //     'category_id' => 'nullable|exists:categories,id',
        //     'is_favorite' => 'boolean',
        //     'tags' => 'array',
        //     'tags.*' => 'exists:prompt_tags,id',
        // ]);

        $aiModels = $request->input('ai_models', []);
        $tags = $request->input('tags', []);

        return DB::transaction(function () use ($request, $aiModels, $tags) {
            $userPrompt = UserPrompt::create([
                'user_id' => Auth::id(),
                'title' => $request['title'],
                'description' => $request['description'] ?? null,
                'content' => $request['content'],
                'category_id' => $request['category_id'],
                'ai_model_ids' => implode(',', $aiModels),
                'is_favorite' => $request['is_favorite'] ?? false,
            ]);

            if (!empty($tags)) {
                $userPrompt->tags()->attach($tags);
            }
            return $userPrompt;
        });

        return redirect()->route('prompt-case.index')
            ->with('success', 'پرامپت با موفقیت ایجاد شد.');
    }

    public function edit($id)
    {
        $tags = Tag::all();
        $ai_models = AIModel::all();
        $categories = Category::all();

        $userPrompts = UserPrompt::byUser(Auth::id())
            ->with('category')
            ->with('tags')
            ->paginate(10);

        $userPromptInfo = UserPrompt::with('tags')->find(31);

        return view('prompt_case.index', compact('userPromptInfo', 'categories', 'tags', 'ai_models', 'userPrompts'));
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
