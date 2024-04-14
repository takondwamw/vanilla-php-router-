<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
    '/' => 'controllers/home.php'
];

function abort(int $code = 404)
{
    http_response_code($code);
    echo "page not found";
    require("views/{$code}.php");
};


function handleRoutes($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require($routes[$uri]);
    } else {
        abort();
    }
}
