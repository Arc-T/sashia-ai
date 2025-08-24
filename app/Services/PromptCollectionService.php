<?php

namespace App\Services;

use Illuminate\Support\Collection;

class PromptCollectionService
{

    public static function all(): Collection
    {
        $jsonPath = public_path('images/part-000001.json');

        $json = json_decode(file_get_contents($jsonPath), true);

        return collect($json)
            ->map(function ($item, $filename) {
                return [
                    'filename' => $filename,
                    'prompt' => $item['p'],
                    'path' => asset('storage/images/prompt_templates/' . $filename),
                ];
            })
            ->values();
    }
}
