<?php
namespace APP\Hola\Controller;
// use IRON\Core\Commun\Security;
// use APP\Admin\Model AS Model;
/**
 * Generador de codigo de Controller de IRON 1
 * @propiedad: IRON 1
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 01/10/2018
 * @version: 1.0
 */ 
class HomeController extends Controller
{
   // use Security;
   // public $model;
   // public $session;
   public function __construct()
   {
       parent::__construct();
       // $this->session = $this->authenticated();
       // $this->model = new Model\HomeModel();
   }
   public function runIndex($request)
   {     $this->tpl->addIni();
     $this->tpl->add('nombre','PRUEBA DE CONTROLLER');
     $this->tpl->renders('view::home/home');
   }
}
?>
