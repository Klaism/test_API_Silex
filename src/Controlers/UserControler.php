<?php

namespace TestApi\Controlers;

use Silex\Application;

class UserControler{
    /**
     * Controler to get all users
     * @param  Application $app silex application
     * @return json  all users in json
     */
    public function getAllUsersAction(Application $app)
    {
        $users=$app["DAOUser"]->getAll();
        return $app->json($users);
    }

    public function getUserAction(Application $app, $id)
    {
        $user=$app["DAOUser"]->findOneById($id);
        return $app->json($user);
    }

};
