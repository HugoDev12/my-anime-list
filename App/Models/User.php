<?php

namespace App\Models;

class User{

    
    /**
     * @var int
     */
    private $id;

    // /**
    //  * @var string
    //  */
    // private $username;

    /**
     * @var string
     */
    private $password;


    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $roles;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $last_login;

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }


    // /**
    //  * Get the value of username
    //  */ 
    // public function getUsername(): string
    // {
    //     return $this->username;
    // }

    // /**
    //  * Set the value of username
    //  *
    //  * @param  string  $username
    //  *
    //  * @return  self
    //  */ 
    // public function setUsername(string $username)
    // {
    //     $this->username = $username;

    //     return $this;
    // }

    /**
     * Get the value of password
     * 
     * @return string
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param  string  $password
     *
     * @return  self
     */ 
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of roles
     *
     * @return  string
     */ 
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     * @return  self
     */ 
    public function setRoles()
    {
        $this->roles = ["ROLE_USER"];

        return $this;
    }

    /**
     * Get the value of date
     *
     * @return  string
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @param  string  $date
     *
     * @return  self
     */ 
    public function setDate(string $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of last_login
     *
     * @return  string
     */ 
    public function getLast_login()
    {
        return $this->last_login;
    }

    /**
     * Set the value of last_login
     *
     * @param  string  $last_login
     *
     * @return  self
     */ 
    public function setLast_login(string $last_login)
    {
        $this->last_login = $last_login;

        return $this;
    }
}