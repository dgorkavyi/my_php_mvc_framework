<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction(): void
    {
        echo '<p>Login Page</p>';
    }

    public function registerAction(): void
    {
        echo '<p>Registration Page</p>';
    }
}