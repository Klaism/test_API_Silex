<?php

namespace TestApi\Models;

use JsonSerializable;

/**
 * Class User
 */
class User implements JsonSerializable
{
    protected $id;
    protected $name;
    protected $email;
    protected $age;

    public function __construct($name,$email){
        $this->name=$name;
        $this->email=$email;
    }
    
    /**
     * Serialize user to json
     */
    public function JsonSerialize(){
        return[
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'age' => $this->getAge()
        ];
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of Age
     *
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of Age
     *
     * @param mixed age
     *
     * @return self
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }


    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

}
