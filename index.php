<?php
header('Content-type: application/json');
require_once __DIR__."/vendor/autoload.php";

$app = new Silex\Application();
require_once __DIR__."/core/app.php";

$app->run();
