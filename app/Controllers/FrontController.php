<?php
namespace App\Controllers;

class FrontController {

public function index($params, $queryParams){
    require __DIR__ . "\\..\\views\\home.php";
}


public function AboutUs(){
    require __DIR__ . "\\..\\views\\About.php";
}
}
?>