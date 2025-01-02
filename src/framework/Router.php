<?php

namespace Framework;

use Framework\Interfaces\ControllerInterface;

class Router
{
    protected $routes = [];

    public function add(string $httpMethod, string $url, ControllerInterface $controller, string $method)
    {
        $this->routes[] = [
            'httpMethod' => $httpMethod,
            'url' => $url,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function load(): Response
    {
        $requestEndpoint = array_filter(explode('?', $_SERVER['REQUEST_URI']))[0];

        foreach ($this->routes as $registeredRoute) {
            if ($registeredRoute['url'] !== $requestEndpoint) {
                continue;
            }

            return call_user_func([$registeredRoute['controller'], $registeredRoute['method']]);
        }

        return new Response([], 404);
    }
}
