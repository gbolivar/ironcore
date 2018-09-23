<?php
namespace APP\Admin\Controller;
use IRON\Complements\Template\Twigs;
use IRON\Core\Commun\All;
use IRON\Core\Store\Cache;
use IRON\Core\Http\Request;

/**
 * Clase Controller encargado de integrar muchas funcionalidades util para el controlador
 * @Author: Gregorio Bolívar <elalconxvii@gmail.com>
 * @Author: Blog: <http://gbbolivar.wordpress.com>
 * @Creation Date: 30/08/2017
 * @version: 0.1
 * @namespace APP\Admin\Controller
 */


class Controller extends All
{
    public $twig;
    public $cache;
    
    public function boot()
    {
    	$this->request = new Request();
        $this->twig = new Twigs();
        $this->cache = new Cache();      
        return $this;
    }

}