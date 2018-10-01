<?php
namespace APP\Hola\Router;
use IRON\Core\Router\Route;
/**
 * Generado por el generador de codigo de router de IRON 1
 * @propiedad: IRON 1
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 01/10/2018
 * @version: 1.0
 */ 
class HolaConfiguration
{
    public function initApp($application,$folder)
    {
      $config_file = $folder.'Router.xml';
      $config = simplexml_load_file($config_file);
      new Route($application,$config);
    }
}
?>
