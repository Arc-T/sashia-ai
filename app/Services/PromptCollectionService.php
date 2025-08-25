<?php

namespace App\Services;

use Illuminate\Support\Collection;

class PromptCollectionService
{

    public static function DBFusionPrompts(): Collection
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

    public static function LexiaPrompts(): Collection
    {
        $jsonPath = public_path('images/lexica_images.json');

        $json = json_decode(file_get_contents($jsonPath), true);

        return collect($json)
            ->map(function ($item) {
                return [
                    'filename' => $item['id'],
                    'prompt' => $item['prompt'],
                    'path' => 'https://image.lexica.art/md2/' . $item['id'],
                ];
            })
            ->values();
    }
}
