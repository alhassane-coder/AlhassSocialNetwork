<?php
 
 require("bootstrap/locale.php");
 require('config/database.php');
 require("includes/functions.php");
 require('includes/constants.php');

if(isset($_COOKIE['auth'])){
	auto_login();
}

