<?php

require_once __DIR__.'/controllers/UserController.php';
require_once __DIR__.'/UserModel.php';

$userController = new controllers\UserController();

$data = $_POST['data'];

$user = $userController->getUserByEmail($data['email']);

if(count($user) == 0){

    $token      = bin2hex(openssl_random_pseudo_bytes(32));
    $hashedPass = password_hash($data['password'],PASSWORD_DEFAULT);

    $newUser = new UserModel($data['name'],$data['email'],$hashedPass,'/photo/avatar.jpg', $token);

    $result = $userController->addUser($newUser);

    if($result){

        $response = [
            'code' => 200,
            'data' => $newUser->name
        ];

        echo json_encode($response);
    }else{

        $response = [
            'code' => 305,
            'data' => 'error in bd query'
        ];

        echo json_encode($response);
    }//else


}else{

    $response = [
        'code' => 505,
        'data' => $user
    ];

    echo json_encode($response);
}//else
