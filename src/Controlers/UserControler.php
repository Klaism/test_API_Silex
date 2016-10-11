<?php

namespace TestApi\Controlers;

use Silex\Application;

class UserControler{

    public function getAllUsersAction(Application $app)
    {
        $users=$app["DAOUser"]->getAll();
        return json_encode($users);
    }

};
