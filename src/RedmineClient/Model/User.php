<?php

namespace RedmineClient\Model;

class User extends BaseModel
{
    protected $login;

    protected $firstname;

    protected $lastname;

    protected $password;

    protected $mail;

    protected $authSourceId;
    
    public function getLogin()
    {
        return $this->login;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPassword()
    {
        // should be null in most cases (safety etc.)
        return $this->password;
    }

    public function getAuthSourceId()
    {
        return $this->authSourceId;
    }
}
