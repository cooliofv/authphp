<?php
namespace controllers;

require_once __DIR__.'/../DB.php';

use \database\DB as PDOBase;
use PDO;
use Exception;

class UserController extends PDOBase{

    function __construct(){
        parent::__construct();

    }//constructor

    public function addUser($user){

        try{

            $stmt = $this->connection->prepare('INSERT INTO users (name, email, password, photo, token) VALUES(:name,:email,:password,:photo,:token)');

            $stmt->bindValue(':name', $user->name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $user->email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $user->password, PDO::PARAM_STR);
            $stmt->bindValue(':photo', $user->photo, PDO::PARAM_STR);
            $stmt->bindValue(':token', $user->token, PDO::PARAM_STR);

            if($stmt->execute()){

                return true;
            }//if
        }catch(Exception $ex){

            echo $ex->getMessage();
        }
        return false;

    }//addUser

    public function getUsers(){

        try{

        $users = $this->connection->query("SELECT id,name,email,token,photo FROM users")->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        }catch(Exception $ex){

            echo $ex->getMessage();
        }

       return false;
    }//getUsers

    public function getUserByEmail($email){

        try{

            $user = $this->selectWhere('id,name,email,photo,token', 'users', 'email', $email);

            return $user;
        }catch(Exception $ex){
            $ex->getMessage();
        }//catch

        return false;
    }//getUserByEmail

    public function getUserByToken($token){

        try{

            $user = $this->selectWhere('token','users', 'token',$token);

            return $user;
        }catch(Exception $exception){
            $exception->getMessage();
        }//try

        return  false;
    }//getUserByToken

}//UserController