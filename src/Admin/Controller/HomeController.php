<?php

namespace APP\Admin\Controller;
use IRON\Core\Commun\Security;
use APP\Admin\Model;

/**
 * Generador de codigo de Controller de Hornero 0.8
 * @propiedad: Hornero 0.8
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 04/08/2017
 * @version: 1.0
 * @namespace APP\Admin\Controller
 */


class HomeController extends Controller{
     private $model;
     public function __construct()
     {
        parent::boot();
        $this->model = new Model\HomeModel();

     }
     /**
      * Method encargado de mostrar la pantalla de inicio del sistema
      * @param resource $request
      * @return \JsonSerializable $view
      */
     public function runIndex()
     {
        
         //$this->model->test();
         $this->twig->addIni();
         $this->twig->add('site', 'IronCore, fast development core.');
         $this->twig->add('nombres2', array('name' => 'GREGORIO2', 'apellido'=>'BOLIVARs' ));
         $this->twig->show('main/home.twig');
     }

     public function runPostForm()
     {
        print_r($this->request->postParameter()); die();
     }
}
?>