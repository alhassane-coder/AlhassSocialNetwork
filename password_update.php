<?php
session_start();
require("includes/init.php");
include('filters/auth_filter.php');

if(isset($_POST['change_password'])){

	 if(not_empty(['current_password','new_password','new_password_confirm'])){

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

			            //Si tout est bon on verifie l'authenticité du mot de passe en bdd

			            $q = $db->prepare('SELECT password as hashed_password FROM users WHERE id=? ');

			            $q->execute([get_session('user_id')]);

			            $passwordHasBeenFound=$q->rowCount();

			            $data=$q->fetch(PDO::FETCH_OBJ);



			            if($passwordHasBeenFound && password_verify($current_password,$data->hashed_password )){

			            	// Si tout est bon on modifie son mot de passe et le redirige à son profil
			            	$q = $db->prepare('UPDATE users SET password = :new_password WHERE id=:id');

			            	$success = $q->execute([
                                 'new_password'=>password_hash($new_password, PASSWORD_BCRYPT),
                                 'id'=>get_session('user_id')

			            	]);

                             if($success){

                             	$_SESSION['success']="<i class=\"fas fa-check-circle\"></i>  Mot de passe changée avec succès";// Variable session pour afficher un succès avec alertify

                            	redirect('profile?id='.get_session('user_id'));

                             }


			            } else {
			            	$errors[] = '<i class="fas fa-exclamation-triangle"></i> Le mot de passe actuel saisi est incorrect.<br> Veuillez réessayer SVP';
	    	               save_input_data();


			            }


		            } else {
		            	save_input_data();
		            }
	} else {

	    	$errors[] = '<i class="fas fa-exclamation-triangle"></i> Veuillez SVP remplir tous les champs!';
	    	save_input_data();
	    }

} else {
	clear_input_data();
}


require('views/password_update.view.php');
