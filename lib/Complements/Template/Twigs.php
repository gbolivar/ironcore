<?php 
namespace IRON\Complements\Template;
use IRON\Core\Commun\All;
use IRON\Core\Store\Cache;

/**
 * Permite gestionar las vistas del contralador con el componente twig
 * @namespace IRON\Complements\Template
 * @extends Composer del paquete "twig/twig": "2.0"
 * @Author: Gregorio Bolívar <elalconxvii@gmail.com>
 * @Author: Blog: <http://gbbolivar.wordpress.com>
 * @Creation Date: 22/09/2018
 * @version: 0.1
 */
class Twigs 
{
        public $cache;
        public $item;
        public $html;
        public $twig;
        public $loader;

        public function __construct()
        {
                $this->cache = new Cache();
                $this->html;
                $tmGen = All::DIR_THEME.$this->cache->get('dir_theme');
                $tmApp = All::DIR_SRC.APP.All::APP_VIEWS;
                $patCh = All::DIR_SRC.APP.All::APP_CACHE;

                $themePath = array($tmGen,$tmApp);
                $this->loader = new \Twig_Loader_Filesystem($themePath);
                $this->twig = new \Twig_Environment($this->loader, array(
                        'cache' => $patCh, 
                        'debug' => true
                ));
                $this->twig->addExtension(new \Twig_Extension_Debug());

                return $this;
        }

        /**
         * Permite renderizar la vista e imprimir el resultado en html en la vista
         * @param array $object, valores de datos que van a la vista
         * @param boolean $cifrar, opcion para permitir cifrar html
         * @return resource $html 
         */
        public function show($vista, $cifrar=false)
        {

        	$object=(array)self::addEnd();
            $this->html=($cifrar)?All::compressResponse($this->twig->render($vista, $object)):$this->twig->render($vista, $object);
            echo $this->html;
            self::addIni();
        }

        /**
         * Permite iniciar inicializar un objeto a su
         */
        public function addIni()
        {
                $this->item = null;
        }

        /**
         * Permite agregar datos 
         * @param string $key 
         * @param string $data 
         * @return resource $this
         */
        public function add($key,$data)
        {
                $this->item[$key] = $data;
        }
        /**
         * Permite devolver los datos que fueron seteados por el usuario y estan en lote
         * @return array $return
         */
        public function addEnd()
        {
                self::addExtends();
                $return=(count($this->item)<0)?$object = array():$this->item;
                return $return;
        }


        /**
         * Description
         * @return object $this
         */
        public function addExtends(){
              $this->item['All'] = new All();
              return $this;
        }

     



}