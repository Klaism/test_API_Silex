<?php

require_once __DIR__.'/config/config.php';

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

require_once __DIR__.'/route.php';
