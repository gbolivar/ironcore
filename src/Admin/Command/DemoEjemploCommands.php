<?php
namespace APP\Operador\Commands;
use IRON\Core\Console;
use IRON\Core\Commun\All;
/**
 * Generador de codigo de Commands de Hornero 4
 * @propiedad: Hornero 4
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 30/04/2018
 * @version: 1.0
 */ 
class DemoEjemploCommands
{
  static $nombre= 'run Commands Go.';
   public function __construct()
   {}
   public static function main() : void
   {
      die(self::$nombre);
   }
}
?>
