<?php
$json = json_decode(file_get_contents('output.json'));
$url = $json->secure_url;

$files = glob('resources/views/layout/*.blade.php');
$authFiles = glob('resources/views/auth/*.blade.php');
$allFiles = array_merge($files, $authFiles);

foreach ($allFiles as $file) {
    if (is_file($file)) {
        $content = file_get_contents($file);
        $content = preg_replace('/{{ asset\([\'"]images\/logo\.png[\'"]\) }}/', $url, $content);
        $content = preg_replace('/\/images\/logo\.png/', $url, $content);
        file_put_contents($file, $content);
        echo "Updated $file\n";
    }
}
