<?php
namespace App\Controllers;

class FrontController {

public function index(){
    require __DIR__ . "\\..\\Views\\home.php";
}

}


?>