<?php
if (!defined('DB_SERVER')) define('DB_SERVER', 'Localhost');
if (!defined('DB_USERNAME')) define('DB_USERNAME', 'root');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', '');
if (!defined('DB_NAME')) define('DB_NAME', 'classroom');

$link=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if($link === false)
{
	die("Error : Could not connect. " .mysqli_connect_error());
}
?>