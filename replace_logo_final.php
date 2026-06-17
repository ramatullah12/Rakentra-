<?php
$url = 'https://res.cloudinary.com/dajmg24cl/image/upload/v1726538843/t3ycq5dkxa2dym2gm9tl.png';

$files = glob('resources/views/layout/*.blade.php');
$authFiles = glob('resources/views/auth/*.blade.php');
$allFiles = array_merge($files, $authFiles);

foreach ($allFiles as $file) {
    if (is_file($file)) {
        $content = file_get_contents($file);
        
        // Ganti asset('images/logo.png')
        $content = mb_ereg_replace('\{\{\s*asset\([\'"]images/logo\.png[\'"]\)\s*\}\}', $url, $content);
        
        // Ganti /images/logo.png
        $content = str_replace('/images/logo.png', $url, $content);
        
        file_put_contents($file, $content);
        echo "Successfully updated logo in: $file\n";
    }
}
echo "All done.\n";
