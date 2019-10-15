<?php

// Disable error reporting.
error_reporting(0);

// Load JSON objects.
$json = json_decode(file_get_contents("assets.json"), true);
$array = $json[$_GET['q']];

// Check if array has objects before continuing.
// If there is no objects set, fallback to Just Chatting instead.
if (!$array) $array = $json["Just Chatting"];

// Get random JSON object.
$imageUrl = $array[rand(0, count($array) - 1)];

// Set content type depending on filename.
header("Content-Type: " . mime_content_type($imageUrl));

// Output the image.
echo file_get_contents($imageUrl);