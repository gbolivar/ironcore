<?php
namespace APP\Admin\Controller;
use APP\Admin\Model;
use IRON\Core\Commun\Security;
use IRON\Core\Store\Cache;

/**
 * Generador de codigo de Controller de Hornero 1.0
 * @propiedad: Hornero 1.0
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 28/08/2017
 * @version: 1.0
 * @namespace APP\Admin\Controller
 */


class LoginController extends Controller
{
   

    public function __construct()
    {
        $this->model = new Model\LoginModel();
    }

    /**
     * Permite mostrar el formulario de ingreso de session del usuario
     * @return Template $html
     */
    public function runIndex()
   {
       if(!isset($_SESSION['usuario'])) {
           $this->tpl->addIni();
           $this->tpl->add('msjError', $this->cache->get('msjError'));
           $this->tpl->add('msjSuccess', $this->cache->get('msjSuccess'));
           $this->tpl->renders('view::home/login');
       }
   }


}
?>