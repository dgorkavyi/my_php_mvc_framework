<?php

namespace application\core;

use application\core\View;

abstract class Controller
{
    public array $params;
    public $view;
    public $model;

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->view = new View($params);
        $this->model = $this->loadModel($params['controller']);
    }

    public function loadModel($name)
    {
        $name = ucfirst($name);
        $path = "application\models\\$name";
    
        if (!class_exists($path)) {
            echo $path;
        }

        return new $path;
    }
}