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
define('APP_TITLE','COD Project');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . APP_TITLE);
define('APP_URL','http://www.codproject.com/');

require('core/models/class.Connection.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Users.php');

//golbal var for users
$users = Users();

?>
