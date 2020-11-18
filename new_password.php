<?php
session_start();
require("includes/init.php");
if(isset($_POST['change_password'])){

  if(!empty($_GET['pseudo'])){

  	 if(not_empty(['new_password','new_password_confirm'])){

	    $errors=[];

	    extract($_POST);

		 if(mb_strlen($new_password) < 6){

		         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nouveau mot de passe  trop court! (Minimum 6 caractères)';

		   } else {
	               
		             if($new_password != $new_password_confirm){
		                	
		                	$errors[]='<i class="fas fa-exclamation-triangle"></i> Les deux mots de passes ne concordent pas !';
		             }
		          }


		            if(count($errors) == 0){

			            	// Si tout est bon on modifie son mot de passe et le redirige à son profil
			            	$q = $db->prepare('UPDATE users SET password = :new_password WHERE pseudo=:pseudo');

			            	$success = $q->execute([
                                 'new_password'=>password_hash($new_password, PASSWORD_BCRYPT),
                                 'pseudo'=>$_GET['pseudo']

			            	]);
                             
                             if($success){

                             	$_SESSION['success']="success";// Variable session pour afficher un succès avec alertify


                            	redirect('login');

                             }


			            }


		            } else { 
	    	
					    	$errors[] = '<i class="fas fa-exclamation-triangle"></i> Veuillez SVP remplir tous les champs!';
					    	save_input_data();
	 					  }


  } else{
  	echo "L'utilisateur_n'existe_pas";

  }
	
} else {
	clear_input_data();
}


require('views/new_password.view.php');
