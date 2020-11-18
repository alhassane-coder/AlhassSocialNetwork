
<?php
require('includes/functions.php');

if(!isset($_SESSION['user_id']) or !isset($_SESSION['pseudo'])){
$_SESSION['forwading_url']=$_SERVER['REQUEST_URI'];

set_flash("<i class=\"fas fa-exclamation-circle\"></i>  Contenu réservée aux membres.<br> Inscrivez-vous ou Connectez-vous pour y acceder.",'danger');
	header('Location: login');
	exit();
}
?>
