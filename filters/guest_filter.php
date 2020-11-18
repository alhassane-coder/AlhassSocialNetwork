
<?php
require('includes/functions.php');
if(isset($_SESSION['user_id']) or isset($_SESSION['pseudo'])){
	
	set_flash("<i class=\"fas fa-exclamation-circle\"></i>  Vous êtes déjà connecté ".$_SESSION['pseudo']." !<br> déconnectez-vous pour vous inscrire avec un autre compte ou vous reconnecter",'warning');
	header('Location: index');
	exit();
}
?>
