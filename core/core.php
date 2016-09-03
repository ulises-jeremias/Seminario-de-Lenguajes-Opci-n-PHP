<?php
/*
  The Kernel of the App!
*/
session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');
#Connection Constants
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','COD-Project');
#APP Constants
define('HTML_DIR','html/');
define('APP_TITLE','COD-Project');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . ' COD-Project.');
define('APP_URL','http://www.cod-project.com/');

require('core/models/class.Conexion.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Users.php');

//golbal var for users
$users = Users();

?>
