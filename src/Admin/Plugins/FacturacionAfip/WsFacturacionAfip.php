<?php
namespace APP\Operador\Plugins\FacturacionAfip;
use IRON\Core\Commun\Logs;
/**
 * Generado el autor de codigo 
 * @propiedad: icley
 * @autor: Ing. Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 24/05/2018
 * @version: 1.0
 */
class WsFacturacionAfip
{
	private $endpoint;
	private $wsdlFile;
	private $parameter;
	use Logs;

	public function setEndPonit($endpoints)
	{
		$this->endpoint=$endpoints;
	}

	public function getEndPonit()
	{
		return $this->endpoint;
	}

	public function setWsdlFile($wsdlFiles)
	{
		$this->wsdlFile=$wsdlFiles;
	}

	public function getWsdlFile()
	{
		return $this->wsdlFile;
	}

	public function setParameter($parameters)
	{
		$this->parameter=$parameters;
	}

	public function getParamete()
	{
		return $this->parameter;
	}

	public function startWs()
	{
		$this->logDebug('WSFACTURACION: START');
		$config = array(
				"location"=>self::getEndPonit(),
				"trace"=>true,
				"exceptions"=>false
			);

		 //Creación del cliente SOAP
		$clienteSOAP = new \SoapClient(__DIR__.DIRECTORY_SEPARATOR."WebServiceDeGestionComercial.wsdl",$config);

		$namespace = 'http://gestionComercial.servicios.ws.core.server.na';

		$classBase = 'generarFacturaDeVenta';
		       
		$soapheader = new \SoapHeader($namespace,$classBase);

		$clienteSOAP->__setSoapHeaders($soapheader);
		//Invocamos a una función del cliente, devolverá el resultado en formato array.
		
		$valor = $clienteSOAP->generarFacturaDeVenta(self::getParamete());
		$this->logDebug('RESULTADO: START'.$valor);
		$this->logDebug('WSFACTURACION: END');

		return $valor;
	}
}
?>