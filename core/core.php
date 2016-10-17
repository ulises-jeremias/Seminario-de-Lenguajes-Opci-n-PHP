<?php

/*
  The Kernel of the App!
*/

session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');

#Connection Constants
define('DB_HOST','localhost');
#define('DB_USER','root');
#define('DB_PASS','');
define('DB_USER','grupo24');
define('DB_PASS','AeJu4uni');
define('DB_NAME','grupo24');

#APP Constants
define('HTML_DIR','html/');
define('APP_TITLE','Dealership');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . APP_TITLE);
define('APP_URL','http://www.dealership.com/');

require('core/models/class.Connection.php');
require('core/models/interfaces/interface.functions.php');
require('core/models/class.Vehicle.php');
require('core/models/class.Vehicles_Characts.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Users.php');
require('core/bin/functions/getSearchQuery.php');
require('core/bin/functions/getListQuery.php');
require('core/bin/functions/getQuery.php');
require('core/bin/functions/getFunctions.php');
require('core/bin/functions/Show_Img.php');
require('core/bin/functions/Vehicles.php');
require('core/bin/functions/Vehicles_Characts.php');

//golbal var for users
$_users = Users();

//glebal vars for vehicles and characteristics
$_vehicles_characts = Vehicles_Characteristics();
$_vehicles = Vehicles();

?>
