<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/config/config.php';

ErrorHandler::register();
ExceptionHandler::register();

// Initialisation of the Database

// Register JSON data decoder for JSON requests
$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

try{
    $app["connection"] = new PDO(
        "mysql:dbname=".$app["config"]["db"]["BASE"].
        ";host=".$app["config"]["db"]["SERVER"],
        $app["config"]["db"]["USER"],
        $app["config"]["db"]["PASSWD"]
    );

}
catch(PDOException $e){
    http_response_code (500 );
    echo json_encode(array(
        'status' => 500,
        'error' => "Sql connection failed"
    ));
    exit();
}

// Register DAOUser into the app

$app["DAOUser"] = function ($app) {
    return new TestApi\DAO\DAOUser($app);
};

require_once __DIR__.'/route.php';
