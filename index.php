<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "PHP is working!<br>";
echo "Current directory: " . __DIR__ . "<br>";


if (is_dir(__DIR__ . '/lib/Twig')) {
    echo "Twig library found!<br>";
} else {
    echo "ERROR: Twig library NOT found!<br>";
}


if (is_dir(__DIR__ . '/templates')) {
    echo "Templates folder found!<br>";
    $files = scandir(__DIR__ . '/templates');
    echo "Template files: " . implode(', ', $files) . "<br>";
} else {
    echo "ERROR: Templates folder NOT found!<br>";
}

echo "<br>If you see this, the server is responding!";
