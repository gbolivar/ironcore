<?php
namespace IRON\Tools;
// Clase encargada de procesar patron de diseño Faactory para encapsular los elementos all
use IRON\Core\Commun\All;
Class Utility
{
	static public $todo;

	/**
	 * Permite imprimir un arreglodeobjetos 
	 * @param Array $array, imprime todo el arreglo del mensaje
	 */
	static function pp($array)
	{
		$todo = new all();
		$todo->pp($array);
	}
}
