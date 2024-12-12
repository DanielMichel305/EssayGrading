<?php
require __DIR__ . '\\..\\vendor\\autoload.php';
require __DIR__ . '\\..\\DB\\database.inc.php';

use App\Controllers\userController;
use App\Routers\authRouter;
use App\Routers\userRouter;
use Bramus\Router\Router;

$router= new Router();


$router->mount('/auth', function () use($router) {
    $user = new userController();
    $authRouter = new authRouter($user);        
    
    $authRouter->mountRouter($router);
});

$router->mount('/users', function() use ($router){
    $user = new userController();
    $userRouter = new userRouter($user);
    $userRouter->mountRouter($router);

});

//Include Leaderboard

$router->get('/', function(){

    echo "HEYY";

});

$router->run();





// use App\Models\UserModel;
// $requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
// $requestMethod = $_SERVER['REQUEST_METHOD'];
// $URIsegments = explode('/', $requestUri);
// $controllerName = !empty($URIsegments[0]) ? ucfirst($URIsegments[0]) . 'Controller' : 'FrontController';
// $actionName = !empty($URIsegments[1]) ? $URIsegments[1] : 'index';
// $params = array_slice($URIsegments, 2);
// $queryParams = $_GET;
// $controllerClass = "App\\Controllers\\$controllerName";
// if (class_exists($controllerClass)){
//     $Controller = new $controllerClass();    
//     if(method_exists($Controller,$actionName)){
//         if ($requestMethod === 'POST') {          
//             $data = file_get_contents("php://input");
//             $Controller->$actionName($data);
//         }
//         elseif ($requestMethod === 'PUT' || $requestMethod === 'DELETE') {
//             parse_str(file_get_contents("php://input"), $data);
//             $Controller->$actionName($data);
//         } 
//         else {
//             $Controller->$actionName(params: $params,queryParams: $queryParams); // For GET requests
//         }
//     } 
//     else {
//         http_response_code(404);
//         echo "404 Not Found: Action does not exist.";
//     }   
// }
// else {
//     http_response_code(404);
//     echo "404 Not Found: Controller does not exist.";
// }


?>