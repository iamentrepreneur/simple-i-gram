<?php

namespace App\Application\Router;

use App\Application\Views\View;
use App\Exceptions\ViewNotFoundException;

class Router implements RouterInterface
{
    use RouterHelper;
    public function handle(array $routes): void
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        $uri = $_SERVER['REQUEST_URI'];
        $only_routes = [];
        foreach ($routes as $ru) {
            $only_routes[] = $ru['uri'];
        }

        $type = $requestMethod == 'POST' ? 'post' : 'page';
        $filteredRoutes = self::filter($routes, $type);

        if (in_array($uri, $only_routes)) {
            foreach ($filteredRoutes as $route) {
                if($route['uri'] == $uri) {
                    if (!empty($route['middleware'])) {
                        $middleware = new $route['middleware']();
                        $middleware->handle();
                    }
                    self::controller($route);
                    return;
                }
            }
        } else {
            View::show("pages" . $uri);
        }
    }
}