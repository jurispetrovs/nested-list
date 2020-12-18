<?php

namespace App\Bootstrap;

use FastRoute;

class Router
{
    public function setUp()
    {
        $dispatcher = require_once 'routes.php';

        // Fetch method and URI from somewhere
        $httpMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                echo '404 PAGE NOT FOUND';
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                echo 'METHOD NOT ALLOWED';
                break;
            case FastRoute\Dispatcher::FOUND:
                [$controller, $method] = explode('@', $routeInfo[1]);
                $vars = $routeInfo[2];

                (new $controller)->$method($vars);

                break;
        }
    }
}