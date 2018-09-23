<?php
namespace APP\Admin\Router;
use IRON\Core\Router\Route;
/**
 * Generado por el generador de codigo de router de Hornero 0.8
 * @propiedad: Hornero 0.8
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 04/08/2017
 * @version: 1.0
 */ 
class AdminConfiguration 
{ 
    public function initApp($application,$folder) 
    { 
    	$router = new \Bramus\Router\Router();
		$router->set404(function() {
    		//header('HTTP/1.1 404 Not Found');
    		// ... do something special here
    		die('error 404');
		});
		$route = new AdminRouter();
		$route->boots($router);
      /*$config_file = $folder.'Router.xml'; 
      $config = simplexml_load_file($config_file); 
      new Route($application,$config);*/ 
    } 
} 
?>