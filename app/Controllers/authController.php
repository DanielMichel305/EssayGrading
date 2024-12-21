<?php
namespace App\Controllers;

class authController {

    public static function isLoggedIn(){
     
        if(!isset($_SESSION["UID"]) && !isset($_SESSION["SESSIONID"])){
            return false;
        }
        return true;
    }

}


?>