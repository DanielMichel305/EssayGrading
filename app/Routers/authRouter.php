<?php
namespace App\Routers;

use App\Controllers\userController;
use Bramus\Router\Router;


class authRouter extends UrlRouter{

    private userController $user;

    public function __construct(userController $userController) {
        $this->user = $userController;
    }

    public function mountRouter(Router $router){

        $router->get('/login', function(){
            require_once __DIR__ . "/../Views/Login.php";
        });
        $router->post('/login', function(){
            header("Content-Type :application/json");
            $this->user->login(file_get_contents("php://input"));
        });
        $router->get('/signup',function(){
            require_once __DIR__ . '/../Views/Register.php';
        });
        $router->post('/signup', function(){
            header("Content-Type :application/json");
            $this->user->create(file_get_contents("php://input"));

        });
        $router->get('/logout', function(){
            $this->user->logout();

        });


    }



}

?>