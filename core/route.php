<?php

$app->get("/user/","TestApi\Controlers\UserControler::getAllUsersAction");
$app->get("/user/{id}","TestApi\Controlers\UserControler::getUserAction");
$app->post("/user/","TestApi\Controlers\UserControler::addUserAction");
$app->delete("/user/{id}","TestApi\Controlers\UserControler::deleteUserAction");
