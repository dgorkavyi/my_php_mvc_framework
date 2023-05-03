<?php

namespace application\controllers;

use application\core\Controller;

class NewsController extends Controller
{
    public function showAction(): void
    {
        $vars = [];
        $this->view->render('News', $vars);
    }
}
