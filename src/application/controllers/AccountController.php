<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction(): void
    {
        if (!empty($_POST)) {
            exit(json_encode(["status" => "success", "message" => 123]));
        }

        $vars = [];
        $this->view->render("Login", $vars);
    }

    public function registerAction(): void
    {
        $vars = [];
        $this->view->render("Register", $vars);
    }
}