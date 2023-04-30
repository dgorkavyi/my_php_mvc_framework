<?php

namespace application\core;

abstract class Controller {
    public array $params;
    public function __construct(array $params)
    {
        $this->params = $params;
    }
}