<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Pastikan env CLOUDINARY terbaca
$cloudinaryUrl = env('CLOUDINARY_URL');
if (!$cloudinaryUrl) {
    echo "CLOUDINARY_URL tidak diset di .env\n";
    exit;
}

try {
    $uploadedFileUrl = cloudinary()->upload(public_path('images/logo.png'))->getSecurePath();
    echo "Logo successfully uploaded to Cloudinary: \n";
    echo $uploadedFileUrl . "\n";
} catch (\Exception $e) {
    echo "Error uploading to Cloudinary: " . $e->getMessage() . "\n";
}
