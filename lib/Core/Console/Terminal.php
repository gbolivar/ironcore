<?php
namespace IRON\Core\Console;
use IRON\Core\Commun\{All};


/**
 * Permite recibir los comandos ingresado por los usuarios del sistema
 * @Author: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @Author: Blog: <http://gbbolivar.wordpress.com>
 * @Creation Date: 22/08/2017
 * @version: 4.2
 */

class Terminal extends DispCommands
{
	public $term;
	static $src;

	/**
     * Permite inicializar el proceso para la consola de comandos internos del sistema
	 */
	public function run()
	{	
        	$this->term = $_SERVER['argv'];
        	$obj = new DispCommands();
            $obj->arguments($this->term);
	}

    /**
     * Pemite ejecutar comandos personalizados en la aplicacion indicada por parametros
     * @param String $app, Aplicacion que se desea efectuar el comando personalizado
     * @param String $command, Comando el cual deseamos ejecutar
     * @paran Sting $method, Method encargado de ejecutar que son de method estaticos sin parametro de entrada
     * @return Void
     */
     public static function runCommands($app, $comand)
    {
        $class = __CLASS__;
        $comd = All::upperCase($comand). $class;
        $src = All::DIR_SRC.All::upperCase($app).All::APP_COMMAND.DIRECTORY_SEPARATOR.$comd.'.php';
        die($src);
        try {
            if (file_exists($src)) {
                include_once($src);
                $namespaceCommand = '\APP\\' . All::upperCase($app) . '\\'. $class.'\\' . $comd . '::main';
                $namespaceCommand();
                die('Fin del procesi');
            } else {
                throw new \TypeError('No encon');
            }
        }catch (\TypeError $t){
            die($t->getMessage());
        }
    }
}