<?php
// $servername = 'db';
// $username = $_ENV['MYSQL_USER'];
// $password = $_ENV['MYSQL_PASSWORD'];

// // Create connection
// $conn = new mysqli($servername, $username, $password);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

// print("<pre>".print_r($_SERVER,true)."</pre>");


require_once 'application/lib/dev.php';

use application\core\Router;
use application\lib\Database;

spl_autoload_register(function (string $class) {
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path))
        require $path;
});

$router = new Router();
$db = new Database();
?>

<h1>HELLO</h1>