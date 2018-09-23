<?php
session_start();
date_default_timezone_set('UTC'); 
require '../vendor/autoload.php';

// Elementos necesarios de los .env
$dotenv = new \Dotenv\Dotenv(__DIR__,'..\\.env');
$dotenv->load(); 
use IRON\Core\Load\Configuration;
$init = new Configuration('operador','production');
?>