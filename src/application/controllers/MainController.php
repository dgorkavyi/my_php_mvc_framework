<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Database;

class MainController extends Controller
{
    public function indexAction(): void
    {
        $this->view->render('Main', []);
        $database = new Database();
        $params = [
            'id' => 2
        ];
        $data = $database->row(" id = :id;", $params);
        /**
         * It is possible to make query with $params
         * and without them, like:
         * 
         * SELECT * FROM FOO;
         * 
         */
        foreach ($data as $elem) {
            ?>
            <pre>
                <span>ID:       <?= $elem['id'] ?></span>
                <span>LOGIN:    <?= $elem['login'] ?></span>
                <span>PASSWORD: <?= $elem['password'] ?></span>
            </pre>
            <?php
        }
    }
}