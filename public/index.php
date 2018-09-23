<?php
session_start();
date_default_timezone_set('UTC'); 
require '../vendor/autoload.php';
use IRON\Core\Load\Configuration;
$init = new Configuration('admin','production');
?>