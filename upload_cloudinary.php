<?php
$cloudName = 'dajmg24cl';
$apiKey = '937148821391261';
$apiSecret = 'IxZWjkPLxwAjoWc1FsUL_hSujd0';
$timestamp = time();

// Generate signature
$signature = sha1("timestamp=$timestamp" . $apiSecret);

$url = "https://api.cloudinary.com/v1_1/$cloudName/image/upload";
$filePath = __DIR__ . '/public/images/logo.png';

$postFields = [
    'api_key' => $apiKey,
    'timestamp' => $timestamp,
    'signature' => $signature,
    'file' => new CURLFile($filePath)
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
