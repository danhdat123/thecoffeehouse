<?php
// Define global Variable for Path
$base_path = define('BASE_PATH',__DIR__.'/');


// Include Router
$router = './routes/web.php';
if (!file_exists($router)){
    die('File "web.php" not Found');
}else{
    include $router;
    $router = new Router();
    $router::init();
}




