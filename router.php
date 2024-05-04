<?php

// recieving uri itself parsing it from querry string
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// defining routes associative array to acess and include based on current uri path
$routes = [
    '/' => '/src/index.php',
    '/login' => '/src/login.php',
    '/register' => '/src/register.php',
    '/add' => '/src/new_task.php',
];

function routeToController($uri, $routes)
{
    // check if given uri path exist in routes array, then load a corresponding controller 
    if (array_key_exists($uri, $routes)) {
        require_once (realpath(__DIR__ . $routes[$uri]));
    } else {
        // handle not found pages case
        // return 404 status code and a response
        abort();
    }
}

// function dedicated to responding to Status Codes 
function abort($code = 404)
{
    http_response_code($code);

    require (realpath(__DIR__ . "/views/{$code}.php"));

    die();
}
routeToController($uri, $routes);