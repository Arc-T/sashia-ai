<?php

/**
 * Fetches a single batch of images from the Lexica.art API.
 *
 * @param int|null $cursor The pagination cursor. For the first request, use null.
 * @return array|null The decoded JSON response from the API or null on failure.
 */
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
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36\r\n",
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

/**
 * Fetches multiple pages of images from the Lexica API.
 *
 * @param int|null $initialCursor The starting cursor. Use null for the first page.
 * @param int $maxPages Maximum number of pages to fetch.
 * @param int $delay Delay in seconds between requests.
 * @return array A list of all image objects fetched from the API.
 */
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
        
        // Handle the API response structure
        $batchImages = [];
        if (is_array($data) && isset($data['images'])) {
            // Structure is likely: { "images": [...] }
            $batchImages = $data['images'];
        } elseif (is_array($data) && !isset($data['images']) && !empty($data)) {
            // Structure might be a direct list: [...]
            $batchImages = $data;
        } else {
            echo "Unexpected API response structure.\n";
            print_r($data); // Inspect the response
            break;
        }
        
        if (empty($batchImages)) {
            echo "No more images found. Reached the end.\n";
            break;
        }
        
        // Add the images from this batch to our main list
        $allImages = array_merge($allImages, $batchImages);
        echo "Fetched " . count($batchImages) . " images in this batch. Total so far: " . count($allImages) . "\n";
        
        // Get the cursor for the next page (ID of the last image)
        $lastImage = end($batchImages);
        if (isset($lastImage['id'])) {
            $currentCursor = $lastImage['id'];
            echo "Next cursor will be: $currentCursor\n";
        } else {
            echo "No 'id' field found in the last image. Cannot paginate further.\n";
            break;
        }
        
        $pagesFetched++;
        
        // Delay before the next request
        if ($pagesFetched < $maxPages) {
            echo "Waiting for $delay second(s) before next request...\n";
            sleep($delay);
        }
    }
    
    return $allImages;
}

// Main execution
$outputFilename = 'lexica_images.json';
$maxPagesToFetch = 3; // Start small to test
$delayBetweenRequests = 2; // Be polite

echo "Starting to fetch images from Lexica.art...\n";
$allImagesData = getAllLexicaImages(
    null, // Start from the beginning
    $maxPagesToFetch,
    $delayBetweenRequests
);

// Save the collected data to a JSON file
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

?>