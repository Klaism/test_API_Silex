<?php

namespace TestApi\DAO;

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

}
