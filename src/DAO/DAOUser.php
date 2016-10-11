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

    /**
     * findOneById()
     * get one user by id
     * @param  int $id id of user
     * @return User     User with id = $id
     */
    public function findOneById($id){
        $sql="SELECT * FROM User WHERE id=?";
        $statementUser=$this->app["connection"]->prepare($sql);
        $statementUser->execute([$id]);
        $row=$statementUser->fetch();
        $user=new User($row["name"],$row["email"]);
        $user->setId($row["id"]);
        $user->setAge($row["age"]);
        return $user;
    }

    /**
     * createUser()
     * create a new user
     * @param  User   $user the user to create
     * @return User       created user with an id
     */
    public function createUser(User $user){
        $sql="INSERT INTO User (name,email,age) values(?,?,?)";
        $statementUser=$this->app["connection"]->prepare($sql);
        $statementUser->execute(array(
            $user->getName(),
            $user->getEmail(),
            $user->getAge()
        ));
        $user->setId($this->app["connection"]->lastInsertId());
        return $user;
    }

}
