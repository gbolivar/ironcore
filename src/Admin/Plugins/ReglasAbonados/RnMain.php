<?php 
namespace APP\Operador\Plugins\ReglasAbonados;
use ReglasCalculosHoras;
/**
 * Clase encargada de recibir y procesar la logica de negocio de calculos de horas
 * @propiedad: icley
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 20/07/2018
 * @version: 1.0
 */

class RnMain  
{
	
	/**
	 * Clase main del ejecutador del calculos de horas
	 * @param Integer $horasDiff, Horas de diferencias
	 * @param Integer $precioNeto, El precio neto de la hora que va a cobrar
	 * @return Object $calculado, Objeto con los valores ya calculados, ejemplo Object('vFinal'=>40,'nota'=>'Mensaje')
	 */
	public static function main($horasDiff,$precioNeto)
	{
		$horas = new ReglasCalculosHoras();
		$horas->setHorasDiff($horasDiff); 
		$horas->setPrecioNeto($precioNeto);
		$calculado = $horas->runnable();
		print_r($calculado); die();

	}

	 /**
     * Funcion encargada de hacer los calculos adicionales del precio a cobrar para las fracciones
     * @param Integer $totalMinutos, Minutos a contar
     * @param Integer $adicional, Adicionales fraccionados
     * @return real
     */
    public static function calcularMinutos($totalMinutos,$adicional)
    {
    	die($totalMinutos);
        $tmp=ReglasCalculosHoras::calcularMinutosInterno($totalMinutos,$adicional);
        return $tmp;
    }
}
?>