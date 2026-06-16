<?php
require_once __DIR__ . '/config.php';

// Get clean URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';

// Route to view
$view = $routes[$uri] ?? '404';
$view_file = __DIR__ . '/views/' . $view . '.php';

if (!file_exists($view_file)) {
    $view = '404';
    $view_file = __DIR__ . '/views/404.php';
    http_response_code(404);
}

// Page meta per route
$page_titles = [
    'home'         => SITE_NAME . ' · Home',
    'capabilities' => SITE_NAME . ' · Capabilities',
    'showroom'     => SITE_NAME . ' · Showroom',
    'industries'   => SITE_NAME . ' · Industries',
    'resources'    => SITE_NAME . ' · Resources',
    'about'        => SITE_NAME . ' · About',
    'contact'      => SITE_NAME . ' · Contact',
    'honest_guide' => SITE_NAME . ' · The Honest Guide to AI for Bangladeshi Business',
    '404'          => SITE_NAME . ' · Page not found',
];

$page_title   = $page_titles[$view] ?? SITE_NAME;
$current_path = $uri;

// Honest guide has its own layout
if ($view === 'honest_guide') {
    require $view_file;
    exit;
}

require __DIR__ . '/includes/header.php';
require $view_file;
require __DIR__ . '/includes/footer.php';
