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
        if(!isset($_SESSION["UID"])){
            //echo "Please login and try again!";///change this to redirect to login page
            header("Location: /auth/login");
        }
        else{
            require_once __DIR__  . "\\..\\Views\\AccountDetail.php";
            echo $this->UserModel->__toString();
            echo "->>" .  $_SESSION["UID"];
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

    public function updateInfo($userData){      //add authentication to allow user to only change their Data and no one else's data 
        if(!isset($_SESSION["UID"])){       //////We need to add funtion isLoggedIn()
            header("Content-Type: application/json");
            echo json_encode(["message" => "Failed to update User Data, Try Again later!"]);
        }
        else{
            $userData = json_decode($userData, true);
            if($userData['UID'] == $_SESSION["UID"]){
                $this->UserModel->updateUserData($userData);
                echo "UserData updated ! ";
            }
            else {
                http_response_code(401);
                echo "UNAUTHORIZED!";
            }
            
        }
       

    }
    public function logout(){
        session_destroy();
        echo "Logout success and session destoryed";
    }
    public function create($userData){
        $userData = json_decode($userData, true);
        UserModel::signUp($userData);
       
    }

    public function login($userData){           //NEEDS ALOT OF IMPROVEMENT IN ERROR HANDLING   
        $userData = json_decode($userData,true);

        $userId = UserModel::login($userData['Username'], $userData['Password']);
        if($userId){
            $this->UserModel = new UserModel($userId);
            $_SESSION["Username"] = $this->UserModel->Username;
            $_SESSION["UID"] = $this->UserModel->UID;
            http_response_code(200);
            echo  json_encode(["message" => "Login Success"]);
        }
        else{
            http_response_code(400);
            echo json_encode(["message" => "Username or password incorrect, Try Again!"]);
        }
        
        
        
        
    }

}

/*
To be Done For next Time:
-UpdateUserInfo Function needs improvements as it's a security risk (users can change other users data) IT'S NOT...idk 
        This Wont be a security risk unless a User messes with Session data changing the UID in his current session
        So Secure Sessions uing HTTP and JWT is CRUTIAL
        
-keep refactoring code for other routes/functionalities 
-userController myAccount() lacks a lot of features that require the essayController
-Start on the Forums
-user Sessions, cookies and IP based white/black listing
- reinclude admin dashboard code

*/ 

?>