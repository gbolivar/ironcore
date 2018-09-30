<?php
namespace IRON\Complements\Database;
/**
 * Configuracion de las conexiones bb IRON 1
 * @propiedad: IRON 1
 * @utor: Gregorio Bolivar <elalconxvii@gmail.com>
 * @created: 30/09/2018
 * @version: 1.0
 */ 

trait ConfigDatabase
{

  public $motor;
  public $host;
  public $port;
  public $db;
  public $user;
  public $pass;
  public $encoding;
  function __construct()
  {
   $this->motor;
   $this->host;
   $this->port;
   $this->db;
   $this->user;
   $this->pass;
   $this->encoding;
 }

  /** Inicio  del method  de default  */
  public function default()
  {
   // Driver de Conexion con la de base de datos
   $this->motor = 'pgsql';
   // IP o HOST de comunicacion con el servidor de base de datos
    $this->host = 'host';
   // Puerto de comunicacion con el servidor de base de datos
   $this->port = 'post';
   // Nombre base de datos
   $this->db = 'namedb';
   // Usuario de acceso a la base de datos
   $this->user = 'user';
   // Clave de acceso a la base de datos
   $this->pass = 'admin';
   // Codificacion de la base de datos
   $this->encoding = 'UTF-8';
   return $this;
  }
  /** Fin del caso del method de default */
}

?>