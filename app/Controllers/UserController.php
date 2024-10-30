<?php
namespace App\Controllers;

use App\Models\UserModel;

//require_once __DIR__ ."\\..\\Models\\UserModel.php";
session_start();
class userController{

    private $UserModel;


    public function index($params, $queryParams){   ///Include more filtering options for complex queries
        $users= UserModel::fetchUsers();
        header('Content-Type: application/json');
         http_response_code(200);
         echo json_encode($users);

    }

    public function __construct()
    {
        
        if(isset($_SESSION["UID"])){
            $this->UserModel = new UserModel($_SESSION["UID"]);
        }
    }

    public function myAccount(){
        if(isset($_SESSION["UID"])){
            require __DIR__  . "\\..\\Views\\AccountDetail.php";
            echo $this->UserModel->__toString();
        }
        else{
            echo "Please login and try again!";///change this to redirect to login page
        }
        
    }

    public function deleteAccount($UID){
        if(isset($_SESSION["UID"])){
            $this->UserModel->delete($_SESSION["UID"]);
            $this->logout();
            echo "HARD Account Deleted Successfully!";
        }
        else{
            echo "Please login and try again!";///change this to redirect to login page
        }
       
    }

    public function updateInfo($userData){
        $userData = json_decode($userData, true);
        $this->UserModel->updateUserData($userData);
        echo "UserData updated ! ";

    }
    public function logout(){
        session_destroy();
        echo "Logout success and session destoryed";
    }
    public function create($userData){
        $userData = json_decode($userData, true);
        UserModel::signUp($userData);
       
    }

    public function login($userData){
        $userData = json_decode($userData,true);
        $userID = UserModel::login($userData['Username'], $userData['Password']);
        $this->UserModel = new UserModel($userID);
        $_SESSION["Username"] = $this->UserModel->Username;
        $_SESSION["UID"] = $this->UserModel->UID;
        echo $userID . "  -  " . $this->UserModel->Username;
        
    }

}

?>