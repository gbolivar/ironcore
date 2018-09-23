<?php
namespace APP\Operador\Plugins\ReglasAbonados;
/**
 * Permite efectuar las relas del negocios para implementar los procesos de calculos de horas de los pagos por 
 * horasa
 */
class ReglasCalculosHoras 
{
	public $precioNeto;
	public $horasDiff;
	public $nota;
	public $vFinal;
	/**
	 * Constructor de la clase 
	 */
	public function __construct(argument)
	{
		$this->precioNeto = 0;
		$this->horasDiff = 0;
		$this->nota = '';
		$this->vFinal = 0;
	}

	public function setPrecioNeto($precioNeto):void
	{
		$this->precioNeto=$precioNeto;
	}

	public function getPrecioNeto()
	{
		return $this->precioNeto;
	}
	public function setHorasDiff($horasDiff):void
	{
		$this->horasDiff=$horasDiff;
	}
	public function getHorasDiff()
	{
		return $this->horasDiff;
	}

	public function runnable(){
		  if($horasDiff==0){
            $vFinal = $precioNeto;
            $nota = 'Bloque de cero Horas = '.$vFinal;
        }elseif($horasDiff>3 AND $horasDiff<13){
            $vFinal = $precioNeto * 4;
            $nota = 'Bloque de 4 a 12 Horas, Media estadia = '.$vFinal;
        }elseif($horasDiff==13) {
            $vFinal = $precioNeto * 5;
            $nota = 'Bloque de 13 Horas = '.$vFinal;  //1 Estadia = 6; 1/2 Estadia =3
        }elseif($horasDiff>13 AND $horasDiff<25) {
            $vFinal = $precioNeto * 6;
            $nota = 'Bloque de 14 a 24 Horas, Una estadia = '.$vFinal;
        }elseif($horasDiff>24 AND $horasDiff<37){
            // Una estadia y media 6+3
            $vFinal = $precioNeto * 9;
            $nota = 'Bloque de 25 a 36 Horas, Una estadia y media = '.$vFinal;
        }elseif($horasDiff>36 AND $horasDiff<49){
            // Dos Estadia * 12
            $vFinal = $precioNeto * 12;
            $nota = 'Bloque de 37 a 48 Horas, Dos estadia = '.$vFinal;
        }elseif($horasDiff>48 AND $horasDiff<61){
            // Dos estadia y media * 12 + 3
            $vFinal = $precioNeto * 15;
            $nota = 'Bloque de 49 a 60 Horas, Dos estadia y media = '.$vFinal;
        }elseif($horasDiff>60 AND $horasDiff<73){
            // Tres estadia 18
            $vFinal = $precioNeto * 18;
            $nota = 'Bloque de 61 a 72 Horas, Tres estadia = '.$vFinal;
        }elseif($horasDiff>72 AND $horasDiff<85){
            // Tres estadia y media 18 + 3
            $vFinal = $precioNeto * 21;
            $nota = 'Bloque de 73 a 84 Horas, Tres estadia y media = '.$vFinal;
        }elseif($horasDiff>84 AND $horasDiff<97){
            // Cuatro Estadia 24
            $vFinal = $precioNeto * 24;
            $nota = 'Bloque de 85 a 98 Horas, Cuatro estadia = '.$vFinal;
        }elseif($horasDiff>96 AND $horasDiff<109){
            // Cuatro estadia y Media 24 + 3
            $vFinal = $precioNeto * 27;
            $nota = 'Bloque de 97 a 108 Horas, Cuatro estadia y Media = '.$vFinal;
        }elseif($horasDiff>108 AND $horasDiff<121){
            // Cinco estadia 30
            $vFinal = $precioNeto * 30;
            $nota = 'Bloque de 109 a 120 Horas. Cinco estadia  = '.$vFinal;
        }elseif($horasDiff>120 AND $horasDiff<133){
            // Cinco estadia y medio 30 + 3
            $vFinal = $precioNeto * 33;
            $nota = 'Bloque de 121 a 132 Horas, Cinco estadia y media = '.$vFinal;
        }elseif($horasDiff>132 AND $horasDiff<145){
            // Seis Estadia 36
            $vFinal = $precioNeto * 36;
            $nota = 'Bloque de 133 a 144 Horas, Seis estadia = '.$vFinal;
        }elseif($horasDiff>144 AND $horasDiff<157){
            // Seis Estadia y Media 36 + 3
            $vFinal = $precioNeto * 39;
            $nota = 'Bloque de 145 a 156 Horas, Seis Estadia y media= '.$vFinal;
        }elseif($horasDiff>156 AND $horasDiff<170){
            // Siete Estadia 42
            $vFinal = $precioNeto * 42;
            $nota = 'Bloque de 157 a 169 Horas, Siete estadia = '.$vFinal;
        }elseif($horasDiff>169 AND $horasDiff<182){
            // Siete Estadia 42 y media 3
            $vFinal = $precioNeto * 45;
            $nota = 'Bloque de 170 a 181 Horas, Siete estadia y media = '.$vFinal;
        }elseif($horasDiff>181 AND $horasDiff<194){
            // Ocho Estadia 48
            $vFinal = $precioNeto * 48;
            $nota = 'Bloque de 182 a 193 Horas, 8 estadia = '.$vFinal;
        }elseif($diasDiff==0){
            
            $this->logInfo("P3-0: PrecioNeto: $precioNeto, PFracines: $totalMinutos, Adicional:$adicional, Categoria:$cantg");
            /*for ($i = 1; $i <= $totalMinutos; $i++) {
                //echo $costo.'--*'.$i.'*--';
                $tmp += $adicional;
                
            }*/
            $tmp = self::calcularMinutos($totalMinutos,$adicional);
            $this->logInfo("P3-1: PAdicionales: $tmp, Categoria:".$cantg);
            $vFinal = $precioNeto+$tmp;
            $nota = 'Bloque de 1 a 3 Horas';
        }
	}

	/**
     * Funcion encargada de hacer los calculos adicionales del precio a cobrar para las fracciones
     * @param Integer $totalMinutos, Minutos a contar
     * @param Integer $adicional, Adicionales fraccionados
     * @return real
     */
    public static function calcularMinutosInterno($totalMinutos,$adicional)
    {
        $tmp=0;
        for ($i = 1; $i <= $totalMinutos; $i++) 
        {
            //echo $costo.'--*'.$i.'*--';
            $tmp += $adicional;
        }
        return $tmp;
    }
}
?>