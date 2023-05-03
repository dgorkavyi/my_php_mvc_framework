<?php

namespace application\controllers;

use application\core\Controller;

class NewsController extends Controller
{
    public function showAction(): void
    {
        // $this->view->redirect('https://google.com');
        $vars = [];
        $this->view->render('News', $vars);
    }
}
