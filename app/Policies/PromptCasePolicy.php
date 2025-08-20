<?php

namespace App\Policies;

use App\Models\PromptCase;
use App\Models\User;

class PromptCasePolicy
{

    public function view(User $user, PromptCase $prompt): bool
    {
        // Only the owner can view the prompt
        return $prompt->user_id === $user->id;
    }

    public function update(User $user, PromptCase $prompt): bool
    {
        // Only the owner can update the prompt
        return $prompt->user_id === $user->id;
    }

    public function delete(User $user, PromptCase $prompt): bool
    {
        // Only the owner can delete the prompt
        return $prompt->user_id === $user->id;
    }

    public function share(User $user, PromptCase $prompt): bool
    {
        // Only owners and users with edit permission can share
        return $prompt->user_id === $user->id ||
            $prompt->teams()->where('user_id', $user->id)
            ->where('permission_level', 'edit')->exists();
    }
}
