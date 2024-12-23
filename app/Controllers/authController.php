<?php
namespace App\Controllers;

session_start();
class authController {

    public function __construct()
    {
    }

    public static function isLoggedIn(){
     
        if(!isset($_SESSION["UID"]) || !isset($_SESSION["Username"]) || !isset($_SESSION["user_ip"])){
            //header('location: /auth/login');  ///Although a redirect is needed but this should only check if user is logged in and nothing else 
            return false;
            
        }
        return true;
    }

}


?>