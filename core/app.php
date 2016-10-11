<?php

require_once __DIR__.'/config/config.php';

// Initialisation of the Database

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
