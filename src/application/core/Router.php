<?php

namespace application\core;

class Router
{
    protected array $routes = [];
    protected array $params = [];
    function __construct()
    {
        foreach ((require 'application/config/routes.php') as $route => $params) {
            $this->add($route, $params);
        }
    }
    public function add(string $route, array $params): void
    {
        $this->routes["#^$route$#"] = $params;
    }
    public function match(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $mathces)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    public function run(): void
    {
        if (!$this->match()) {
            echo "<h1>ERROR 404</h1>";
            echo "<pre><hr><b>{$_SERVER['REQUEST_URI']}</b><hr> DOES NOT EXIST.</pre>";
            return;
        }

        extract($this->params);
        $controller_class = 'application\controllers\\' . ucfirst($controller) . "Controller";

        if (!class_exists($controller_class)) {
            echo "<h1>ERROR</h1>";
            echo "<pre>CLASS<hr><b>$controller_class</b><hr>DOES NOT EXIST.</pre>";
            return;
        }

        $action_class = $action . 'Action';

        if (!method_exists($controller_class, $action_class)) {
            echo "<h1>ERROR</h1>";
            echo "<pre>CLASS<hr><b>$action_class</b><hr>DOES NOT EXIST.</pre>";
            return;
        }

        $controller = new $controller_class($this->params);
        $controller->$action_class();
    }
}