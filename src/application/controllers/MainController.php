<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction(): void
    {
        $vars = [];
        $this->view->render('Main', $vars);
    }
}
