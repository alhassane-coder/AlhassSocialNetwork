<?php

//Database crédentials 

define('DB_HOST', 'localhost');
define('DB_NAME', 'alhass_socialnetwork');
define('DB_USERNAME', 'alhassane');
define('DB_PASSWORD', 'thecriminal440');
define('DB_CHARSET', 'utf8mb4');


try
{
	$db= new PDO('mysql:host='.DB_HOST.';charset='.DB_CHARSET.';dbname='.DB_NAME,DB_USERNAME,DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	die('Erreur: '.$e->getMessage());
}