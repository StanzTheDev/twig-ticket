<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

require_once __DIR__ . '/lib/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

$assetFunction = new \Twig\TwigFunction('asset', function ($path) {
    return '/' . ltrim($path, '/');
});
$twig->addFunction($assetFunction);

$page = $_GET['page'] ?? 'landing';

try {
    switch($page) {
        case 'signup':
            echo $twig->render('signup.twig');
            break;
        case 'login':
            echo $twig->render('login.twig');
            break;
        case 'dashboard':
            echo $twig->render('dashboard.twig');
            break;
        case 'ticket':
            echo $twig->render('ticket.twig');
            break;
        default:
            echo $twig->render('landing.twig');
            break;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
