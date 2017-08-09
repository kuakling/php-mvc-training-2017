<?php
require(__DIR__ . '/../vendor/autoload.php');

require(__DIR__ . '/../vendor/surakit/mvc/Mvc.php');

$config = require_once(__DIR__ . '/../app/config/main.php');


$app = new \mvc\web\Application($config);
$app->run();

?>
