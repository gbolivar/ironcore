<?php
namespace APP\Admin\Model;
use IRON\Complements\Database\Base;
use IRON\Core\Commun\{All,Security};
/**
 * Generador de codigo del Modelo de la App Admin
 * @propiedad: Icley 5
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 29/06/2018
 * @version: 2.0
 */ 

class HomeModel extends Base
{
   public function __construct()
   {
       parent::start();
   }

   public function test(){
    $data = $this->base->select('users', ['name','email'], ['id' => 1]);
    print_r( $data); die();
   }



}
?>
