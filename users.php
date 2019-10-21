<?php
require_once  __DIR__.'./controllers/UserController.php';
require_once  __DIR__.'./controllers/AuthController.php';


use controllers\UserController;
use controllers\AuthController;

session_start();

    $userController = new UserController();
    $authController = new AuthController();

    $users = $userController->getUsers();

if(isset($_GET['token'])){

    $tokenFromGet = $_GET['token'];
    $dataType     = $_GET['type'];

    $result = $userController->getUserByToken($tokenFromGet);

    if($result){

        switch($dataType){

            case 'xml': {
                header('Content-Type: text/xml');
                echo $authController->getXmlResponse($users);
            }break;
            case 'json': {
                echo json_encode($users, JSON_UNESCAPED_UNICODE);
            }break;
        }//switch
        exit;
    }//if token correct
}//if token parameter in url

    if(!isset($_SESSION['token'])){
        header('Location: /');
    }//if session

?>

<?php include('templates/header.php') ?>
<div class="container" >
    <div class="d-flex bd-highlight flex-column flex-md-row align-items-center">
        <div class="flex-grow-1 bd-highlight">
            <span class="text-info"><span class="text-primary">Your API token: </span><?php echo $_SESSION['token']; ?></span>
            <br>
            <span class="text-info"><span class="text-primary">Usage: </span>url/users.php?token=tokenKey&type=json or xml</span>
        </div>
        <div class="p-2 bd-highlight">
            Hello, <?php echo $_SESSION['name']; ?>
        </div>
        <div class="p-2 bd-highlight">
            <form action="/logout.php" method="get">
                <button type="submit" class="btn btn-primary" name="user_logout">Logout</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-md-center" style="height: 100vh;">
        <div class="table-responsive">
            <table id="usersTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"><b>id</b></th>
                        <th id="sortByName" scope="col"><b>Name</b> <i class="fa fa-fw fa-sort" ></i></th>
                        <th id="sortByEmail" scope="col"><b>Email</b> <i class="fa fa-fw fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user){ ?>
                        <tr>
                            <td><?php echo $user['id'] ?></td>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('templates/footer.php') ?>