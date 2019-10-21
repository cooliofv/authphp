<?php
namespace controllers;

require_once __DIR__.'/../DB.php';

use database\DB as PDOBase;
use Exception;
use SimpleXMLElement;

class AuthController extends PDOBase{

    public function __construct(){
        parent::__construct();
    }

    public function login($email, $password){

        $user = $this->selectWhere('*','users','email', $email);

        if($user){

            if(password_verify($password, $user[0]->password)){

                return $user[0];
            }
        }//if pass ok

        return false;

    }//login

    public static function logout(){

        if(isset($_GET['user_logout'])){
            session_start();

            session_unset();
            session_destroy();

            header('Location: /');

        }//if
    }//logout

    public function getXmlResponse($data){

        //function defination to convert array to xml
        function array_to_xml($array, &$xml_user_info) {
            foreach($array as $key => $value) {
                if(is_array($value)) {
                    if(!is_numeric($key)){
                        $subnode = $xml_user_info->addChild("$key");
                        array_to_xml($value, $subnode);
                    }else{
                        $subnode = $xml_user_info->addChild("item$key");
                        array_to_xml($value, $subnode);
                    }
                }else {
                    $xml_user_info->addChild("$key",htmlspecialchars("$value"));
                }
            }
        }

        //creating object of SimpleXMLElement
        $xml_user_info = new SimpleXMLElement("<?xml version=\"1.0\"?><items></items>");

        //function call to convert array to xml
        array_to_xml($data,$xml_user_info);


        return $xml_user_info->asXML();
    }//getXmlResponse

}//AuthController