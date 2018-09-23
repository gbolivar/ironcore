<?php
namespace APP\Operador\Plugins\FacturacionAfip;
use IRON\Core\Store\Cache;
/**
 * Clase encargada de recibir y procesar la logica de envio de datos al afip del sistema nexus
 * @propiedad: icley
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 24/05/2018
 * @version: 1.0
 */
class WsMain extends WsFacturacionAfip
{
	public $cuit;
	public $idDePuntoDeVenta;
	public $renglonesDetallados;
	public $totalPrecalculado;
	public $tmp;
	public $reto;

	/**
	 * Setteo de los datos del cuil
	 * @param String $cuits, Cuit de la empresa 
	 */
	public function setCuit($cuits)
	{
		$this->cuit = $cuits;
	}

	/**
	 * Getter de los datos del cuil
	 * @return String $cuits, Cuit de la empresa 
	 */
	public function getCuit()
	{
		return $this->cuit;
	}

	/**
	 * Setteo de los datos del cuil
	 * @param String $cuits, Cuit de la empresa 
	 */
    public function setPuntoVenta($punto)
    {
    	$this->idDePuntoDeVenta = $punto;
    }


	/**
	 * Getter del punto de venta
	 * @return String $idDePuntoDeVenta, Identificador del punto de venta 
	 */
    public function getPuntoVenta()
    {
    	return $this->idDePuntoDeVenta;
    }

	/**
	 * Setteo de los datos de renglone
	 * @param fecha $renglone, Renglones de item de la factura, ejemplo: (Hora formato 24)
	 */
    public function setReglonesDetalles($renglone)
    {
    	$this->renglonesDetallados = $renglone;
    }

	/**
	 * Getter del renglon detallado
	 * @return String $renglonesDetallados, reglones detallados de la factura 
	 */
    public function getReglonesDetalles()
    {
    	return $this->renglonesDetallados;
    }

	/**
	 * Setteo de los datos del total de  la factura
	 * @param Long $total, total del valor d ela factura
	 */
    public function setTotal($total)
    {
    	$this->totalPrecalculado=$total;
    }

	/**
	 * Getter de los datos del total de  la factura
	 * @return Long $total, total del valor d ela factura
	 */
    public function getTotal()
    {
    	return $this->totalPrecalculado;
    }

	/**
	 * Enviando los datos a la clase que se encarga de enviar los datos
	 */
	public function sendData(){
		try {
			$this->setEndPonit($_ENV['ENDPOINT']);
			$this->setWsdlFile($_ENV['WSDLFILE']);
		
			$parameters= array(
			"sesionDeTicketDeAcceso"=>$_ENV['SESIONDETICKETDEACCESO'],
			"versionDelCliente"=>$_ENV['VERSIONDELCLIENTE'],
			"resumenDeDocumentoComercialWS"=>array(
				"cuit"=>"",
				"idDePuntoDeVenta"=>array("id"=>4,"idDeServidor"=>$_ENV['SERVIDOR_ID']),
				"renglonesDetallados"=>array("cantidadDeUnidades"=>"1","descripcion"=>self::getReglonesDetalles()), //1 pesos
				"totalPrecalculado"=>array("moneda"=>array("idCompuesto"=>array("id"=>"1","idDeServidor"=>$_ENV['SERVIDOR_ID']),"simbolo"=>"$"),"monto"=>self::getTotal())
				)
			);
			
			$this->setParameter($parameters);
			$this->reto = $this->startWs();
			return $this->reto;
		} catch (Exception $e) {
			die($e->getMensages());
		}
		    // Agregar el dinero que retorna de la afip
                    /*
                     stdClass Object
                    (
                        [return] => stdClass Object
                            (
                                [bajaLogica] => 
                                [idCompuesto] => 
                                [idUniversal] => 
                                [ordinal] => 
                                [codigoDeAutorizacion] => 
                                [numero] => stdClass Object
                                    (
                                        [numero] => 26
                                        [prefijo] => 12
                                    )

                                [totalPreCalculado] => stdClass Object
                                    (
                                        [moneda] => stdClass Object
                                            (
                                                [bajaLogica] => 
                                                [idCompuesto] => stdClass Object
                                                    (
                                                        [id] => 1
                                                        [idDeServidor] => 1
                                                    )

                                                [idUniversal] => 
                                                [ordinal] => 
                                                [simbolo] => $
                                            )

                                        [monto] => 1
                                    )

                            )

                    )
                     */
	}
}
?>