<?php

$app->get("/user/","TestApi\Controlers\UserControler::getAllUsersAction");
$app->get("/user/{id}","TestApi\Controlers\UserControler::getUserAction");
