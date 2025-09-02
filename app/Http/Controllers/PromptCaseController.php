<?php

namespace App\Http\Controllers;

use App\Models\AIModel;
use App\Models\Category;
use App\Models\Tag;
use App\Models\UserPrompt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PromptCaseController extends Controller
{
    private $pageInfo = [];

    public function __construct()
    {
        $this->pageInfo = [
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'ai_models' => AIModel::all(),
            'user_prompts' => UserPrompt::byUser(Auth::id())
                ->with(['category','tags'])
                ->paginate(10)
        ];
    }

    public function index(Request $request)
    {
        return view('prompt_case.index', [
            'pageInfo' => $this->pageInfo
        ]);
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

        DB::transaction(function () use ($request, $aiModels, $tags) {
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
        });

        return redirect()->route('prompt-case.index')
            ->with('success', 'پرامپت با موفقیت ایجاد شد.');
    }

    public function edit($id)
    {
        $userPromptInfo = UserPrompt::with('tags')->find($id);

        return view('prompt_case.index', [
            'pageInfo' => $this->pageInfo,
            'userPromptInfo' => $userPromptInfo
        ]);
    }

    public function update(Request $request, int $id)
    {
        DB::transaction(function () use ($request, $id) {
            $userPrompt = UserPrompt::findOrFail($id);

            $userPrompt->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'ai_model_ids' => implode(',', $request->input('ai_models', [])),
                'color' => $request->input('color'),
                'is_favorite' => $request->boolean('is_favorite'),
            ]);

            $userPrompt->tags()->sync($request->input('tags', []));
        });

        return redirect()->route('prompt-case.index')
            ->with('success', 'پرامپت با موفقیت آپدیت شد.');

    }

    public function destroy(int $id)
    {
        $userPrompt = UserPrompt::findOrFail($id);
        $userPrompt->delete();

        return redirect()->route('prompt-case.index')
            ->with('success', 'پرامپت با موفقیت حذف شد.');
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
