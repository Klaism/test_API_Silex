<?php

namespace TestApi\Controlers;

use TestApi\Models\User;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * Controler to get one user with his Id
     * @param  Application $app silex application
     * @param  int      $id  id used to select the user
     * @return json           the user in json that you searched
     */
    public function getUserAction(Application $app, $id)
    {
        $user=$app["DAOUser"]->findOneById($id);
        if( $user->getId() == null ){
            return $app->json('User not found',404);
        }
        return $app->json($user);
    }

    /**
     * Controler to add another user
     * @param Request     $request post request with user informations
     * @param Application $app     silex application
     */
    public function addUserAction(Request $request, Application $app)
    {
        if(!$request->request->has('name')){
            return $app->json('Missing parameter: name',400);
        }
        if(!$request->request->has('email')){
            return $app->json('Missing parameter: email',400);
        }
        $user=new User(
            $request->request->get('name'),
            $request->request->get('email')
        );
        if($request->request->has('age')){
            $user->setAge($request->request->get('age'));
        }
        $app["DAOUser"]->createUser($user);
        return $app->json($user);
    }

    /**
     * Controler to delete an user by his id
     * @param  Application $app silex application
     * @param  int      $id  the id of the user
     * @return json           a message confirming that the user has been deleted
     */
    public function deleteUserAction(Application $app, $id)
    {
        $user=$app["DAOUser"]->findOneById($id);
        if( $user->getId() == null ){
            return $app->json('User not found',404);
        }

        $app["DAOUser"]->deleteUser($id);

        return $app->json('User deleted:'.$id,204);

    }

};
