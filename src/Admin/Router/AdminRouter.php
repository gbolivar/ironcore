<?php
namespace APP\Admin\Router;
/**
 * Generado por el generador de codigo de router de Hornero 0.8
 * @propiedad: Hornero 0.8
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 22/09/2018
 * @version: 1.0
 */ 
class AdminRouter
{ 
    public function boots($router) 
    { 
    	$router->setNamespace('APP\Admin\Controller');
    	$router->get('/', 'HomeController@runIndex');

		/*$router->mount('/', function() use ($router) 
		{
		    $router->get('/', 'HomeController@runIndex');

		    $router->post('/h', 'HomeController@runPostForm');

		});*/

		$router->run();
    } 
} 
?>