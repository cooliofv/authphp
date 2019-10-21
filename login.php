<?php

require_once __DIR__.'./controllers/AuthController.php';


$authController = new controllers\AuthController();

$email      = $_POST['email'];
$password   = $_POST['password'];

$result = $authController->login($email, $password);

if($result){
    session_start();
    $_SESSION['token'] = $result->token;
    $_SESSION['email'] = $result->email;
    $_SESSION['name']  = $result->name;

    $response = [

        'code' => 200,
        'data' => json_encode([
            'name' => $result->name,
            'email' => $result->email,
            'token' => $result->token
        ])
    ];

    echo json_encode($response);
    exit;
}//if login ok
else{

    $response = [

        'code' => 505,
        'data' => 'not logged'
    ];

    echo json_encode($response);
    exit;
}//else

