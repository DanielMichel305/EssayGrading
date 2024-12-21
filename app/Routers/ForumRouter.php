<?php
namespace App\Routers;

use App\Controllers\ForumController;
use App\Routers\UrlRouter;
use Bramus\Router\Router;


///Implement Essay Router
///Auth and Verification
//2fa

class ForumRouter extends UrlRouter{
    
    private ForumController $forum;

    public function __construct(ForumController $forum)
    {
        $this->forum = $forum;
    }

    public function mountRouter(Router $router)
    {
        $router->get('/', function (){
            echo "Forums Main Page!";
        });

        $router->get('/thread', function(){     //not the same as search
            header("Content-Type: application/json");
            echo json_encode($this->forum->getForumThreadById());
        });

        $router->get('/thread/u/{id}', function($id){
            header("Content-Type: application/json");
            echo json_encode($this->forum->getUserThreads($id));
        });

        $router->patch('/thread', function(){
            $this->forum->modifyForumThread(file_get_contents('php://input'));
        });

        $router->post('/new-thread', function(){
            $this->forum->createNewThread(file_get_contents('php://input'));
            
        });
        
    }

}


?>