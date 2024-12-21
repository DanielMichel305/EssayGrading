<?php
namespace App\Routers;

use App\Controllers\essayController;
use App\Routers\UrlRouter;
use Bramus\Router\Router;

    class essayRouter extends UrlRouter{

        private essayController $essayController;

        public function __construct(essayController $controller)
        {
            $this->essayController = $controller;
        }

        public function mountRouter(Router $router)
        {
            $router->get('/all', function ($id){    ///Gett All essays 
                echo "id : " . $id;
            });
            $router->get('/', function(){
                $this->essayController->fetchEssaysByQueryData();
            });
            $router->post('/submit', function (){
                $this->essayController->create(file_get_contents("php://input"));
            });
            $router->patch('/', function(){
                ///COMPLETE THIS FUNCTION!!!
                ///PATCH POST AND DELETE FUNCTIONS 
            });
            $router->delete('/remove', function(){
                $this->essayController->delete(file_get_contents('php://input'));
            });
            
        }


    }




?>