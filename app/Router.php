<?php
// Router class to handle routes
namespace App;

class Router
{
    protected $routes = [];
    
    public function get($uri, $controller, $middleware = [])
    {
        $this->routes['GET'][$this->normalizeUri($uri)] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    public function post($uri, $controller, $middleware = [])
    {
        $this->routes['POST'][$this->normalizeUri($uri)] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    public function resolve()
    {
        $uri = isset($_GET['path']) ? trim($_GET['path'], '/') : 'index'; // Default to 'index'
        $method = $_SERVER['REQUEST_METHOD']; // GET or POST

        foreach ($this->routes[$method] as $routeUri => $route) {
            $pattern = preg_replace('/\{(\w+)\}/', '(?P<\1>[^/]+)', $routeUri);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $uri, $matches)) {
                $this->runMiddleware($route['middleware']); // Run Middleware (if any)

                // Remove numeric keys from matches (only keep named parameters)
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                $this->callAction($route['controller'], $params);
                return;
            }
        }

        // 404 error if route is not found
				header('Location: ' . route('404'));
    }

    protected function callAction($controller, $params = [])
    {
        // Check if the controller is a closure
        if (is_callable($controller)) {
            call_user_func_array($controller, $params); // Call the closure with parameters
        } else {
            // Otherwise, handle it as a controller and method
            if (is_array($controller)) {
                $controllerClass = $controller[0];
                $action = $controller[1];
                $controllerInstance = new $controllerClass();
                call_user_func_array([$controllerInstance, $action], $params); // Pass parameters to method
            }
        }
    }

    protected function runMiddleware($middleware)
    {
        foreach ($middleware as $middlewareClass) {
            if (class_exists($middlewareClass)) {
                $middlewareInstance = new $middlewareClass();
                if (method_exists($middlewareInstance, 'handle')) {
                    $middlewareInstance->handle();
                }
            }
        }
    }

    private function normalizeUri($uri)
    {
        return trim($uri, '/');
    }
}