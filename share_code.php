<?php 
session_start();

require("bootstrap/locale.php");
require("includes/init.php");
include('filters/auth_filter.php');


//Si l'utilisateur a cliqué sur le button cloner 
//On verifie l'url 

if(!empty($_GET['id'])){
	
	$code = find_code_by_id($_GET['id']);

         if($code){
               
            $code= $code->code;

         } else {

         	$code= '';

         }
	        
    
} else {

	$code= '';

}



//Si le code source a été soumis ;
if(isset($_POST['save'])){
	
	if(not_empty(['code'])){

		extract($_POST);

		$q=$db->prepare('INSERT INTO codes(code) VALUES (?) ');

		$success= $q->execute([$code]);

		if($success){

           $id = $db->lastInsertId();

           	// On affiche un message et on le redirige vers la page qui montre le code et son id;

		     $_SESSION['code_success']="<i class=\"fas fa-check-circle\"></i>  Code ✍ enregistré avec succès!<br> Vous pouvez partager le lien de la page.";

			  redirect('show_code?id='.$id);


		}else{
			
			set_flash("<i class=\"fas fa-exclamation-circle\"></i> Erreur: Code source non enregistré veuillez réessayer SVP.",'warning');
			redirect('share_code');
		}




} else {

				 
		  $_SESSION['empty_code']="<i class=\"fas fa-exclamation-circle\"></i>  Aucun code enregistré car le champ est vide.<br>Ecrivez du code et réessayez SVP!" ;
			redirect('share_code');
}


}


?>
<?php require('views/share_code.view.php');?>

