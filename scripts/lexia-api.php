<?php

function fetchLexicaBatch($cursor = null) {
    $url = 'https://lexica.art/api/infinite-prompts';
    
    $payload = [
        "text" => "",
        "model" => "lexica-aperture-v3.5",
        "searchMode" => "images",
        "source" => "search",
    ];
    
    if ($cursor !== null) {
        $payload["cursor"] = $cursor;
    }
    
    $jsonPayload = json_encode($payload);
    
    $options = [
        'http' => [
            'header'  => 
                "Content-Type: application/json\r\n" .
                "User-Agent: Mozilla/5.0\r\n",
            'method'  => 'POST',
            'content' => $jsonPayload,
            'timeout' => 30
        ],
    ];
    
    $context  = stream_context_create($options);
    
    try {
        $response = file_get_contents($url, false, $context);
        if ($response === FALSE) {
            throw new Exception("HTTP request failed for cursor $cursor");
        }
        return json_decode($response, true);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        return null;
    }
}

function getAllLexicaImages($initialCursor = null, $maxPages = 5, $delay = 2) {
    $allImages = [];
    $currentCursor = $initialCursor;
    $pagesFetched = 0;
    
    while ($pagesFetched < $maxPages) {
        echo "Fetching page " . ($pagesFetched + 1) . " with cursor: " . ($currentCursor ?? 'null') . "\n";
        
        $data = fetchLexicaBatch($currentCursor);
        if ($data === null) {
            echo "Stopping due to error.\n";
            break;
        }

        // extract images and prompts
        $batchImages  = $data['images']  ?? [];
        $batchPrompts = $data['prompts'] ?? [];

        // index prompts by id for quick lookup
        $promptsById = [];
        foreach ($batchPrompts as $prompt) {
            $promptsById[$prompt['id']] = $prompt;
        }

        // attach prompt text to each image
        foreach ($batchImages as &$img) {
            $promptId = $img['promptid'] ?? null;
            if ($promptId && isset($promptsById[$promptId])) {
                $img['prompt'] = $promptsById[$promptId]['prompt'];
                $img['negativePrompt'] = $promptsById[$promptId]['negativePrompt'];
            } else {
                $img['prompt'] = null;
                $img['negativePrompt'] = null;
            }
        }
        unset($img);

        if (empty($batchImages)) {
            echo "No more images found. Reached the end.\n";
            break;
        }

        $allImages = array_merge($allImages, $batchImages);
        echo "Fetched " . count($batchImages) . " images in this batch. Total so far: " . count($allImages) . "\n";
        
        $lastImage = end($batchImages);
        if (isset($lastImage['id'])) {
            $currentCursor = $lastImage['id'];
            echo "Next cursor will be: $currentCursor\n";
        } else {
            echo "No 'id' field found in the last image. Cannot paginate further.\n";
            break;
        }
        
        $pagesFetched++;
        if ($pagesFetched < $maxPages) {
            sleep($delay);
        }
    }
    
    return $allImages;
}

// Main execution
$outputFilename = 'lexica_images.json';
$maxPagesToFetch = 3;
$delayBetweenRequests = 2;

echo "Starting to fetch images from Lexica.art...\n";
$allImagesData = getAllLexicaImages(null, $maxPagesToFetch, $delayBetweenRequests);

echo "\nSaving " . count($allImagesData) . " images to '$outputFilename'...\n";
try {
    $jsonData = json_encode($allImagesData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($jsonData === false) {
        throw new Exception('JSON encoding failed: ' . json_last_error_msg());
    }
    
    $result = file_put_contents($outputFilename, $jsonData);
    if ($result === false) {
        throw new Exception("Failed to write to file '$outputFilename'");
    }
    
    echo "Done! Data successfully saved.\n";
} catch (Exception $e) {
    echo "Error saving file: " . $e->getMessage() . "\n";
}

