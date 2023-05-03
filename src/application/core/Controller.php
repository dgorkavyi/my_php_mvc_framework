<?php

namespace application\core;

use application\core\View;

abstract class Controller
{
    public array $params;
    public $view;

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->view = new View($params);
    }
}
