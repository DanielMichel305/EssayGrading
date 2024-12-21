<?php
namespace App\Routers;

use App\Controllers\userController;
use Bramus\Router\Router;

class userRouter extends UrlRouter{

    private userController $user;

    public function __construct(userController $controller)
    {
        $this->user = $controller;
    }

    public function mountRouter(Router $router)
    {
        $router->get('/myAccount', function(){
            $this->user->myAccount();   //This method needs a loth of added SPICE...
        });
        $router->patch('/update-data', function(){
            $this->user->updateInfo(file_get_contents("php://input"));
        });
    }

}


?>