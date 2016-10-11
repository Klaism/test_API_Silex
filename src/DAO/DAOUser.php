<?php

namespace TestApi\DAO;

use TestApi\Models\User;

/**
 * Class DAOUser
 *
 * DataBase Access Object for the model user
 */
class DAOUser
{
    protected $app;

    public function __construct($app){
        $this->app = $app;
    }

    /**
     * getAll()
     * get all the users
     * @return Array list of users
     */
    public function getAll(){
        $res=array();
        $sql="SELECT * FROM User";
        $statementUsers=$this->app["connection"]->prepare($sql);
        $statementUsers->execute();

        while($row=$statementUsers->fetch()){
            $user=new User($row["name"],$row["email"]);
            $user->setId($row["id"]);
            $user->setAge($row["age"]);
            array_push($res,$user);
        }
        return $res;
    }

}
