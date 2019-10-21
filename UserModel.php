<?php

class UserModel {

    public $id;
    public $name;
    public $email;
    public $password;
    public $photo;
    public $token;

    public function __construct($name, $email, $password, $photo, $token){

        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
        $this->photo    = $photo;
        $this->token    = $token;

    }

}//UserModel