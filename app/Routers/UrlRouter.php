<?php
namespace App\Routers;
use Bramus\Router\Router as Router;

abstract class UrlRouter{

    abstract public function mountRouter(Router $router);

}

?>