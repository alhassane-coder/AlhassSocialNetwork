<?php 
session_start();

require("bootstrap/locale.php");
require("includes/init.php");


		if(!empty($_GET['id'])){

             
             $code = find_code_by_id($_GET['id']);
 
              if(!$code){

              	 //Si vide on le redirige pour qu'il remplisse à nouveau 
                set_flash("<i class=\"fas fa-exclamation-circle\"></i>Code source ✍ vide, enregistrez d'abord ",'warning');
              	redirect('share_code');
              
              }

		
		} else {

			set_flash("<i class=\"fas fa-exclamation-circle\"></i> Veuillez d'abord enregistrer le code source ✍!",'warning');

			redirect('share_code');
		}

?>
<?php require('views/show_code.view.php');?>

