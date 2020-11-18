<?php 
session_start();

require("includes/init.php");
include('filters/guest_filter.php');
;

//Si le formulaie de connection a été soumis ;
if(isset($_POST['login']))
  { 
    if(not_empty(['credentials','password']) ){

        extract($_POST);

        $q=$db->prepare("SELECT id,pseudo,email,avatar,password as hashed_password FROM users WHERE
         (pseudo = :credentials or email = :credentials)
         and active='1'");
        
        $q->execute([
           
           'credentials'=> $credentials
        ]);

        $userHasBeenFound=$q->rowCount();
         
        $user = $q->fetch(PDO::FETCH_OBJ);

        if($userHasBeenFound && password_verify($password, $user->hashed_password) ){

          // Variable session pour la librairie uplodify

           $_SESSION['connected']="Ravie de vous voir $user->pseudo , Vous êtes connecté avec succès <i class=\"fas fa-check-circle\"></i>.<br> Profitez-en ☺!";

            $_SESSION['user_id']= $user->id;
            $_SESSION['pseudo']= $user->pseudo;
            $_SESSION['email']= $user->email;
            $_SESSION['avatar']=$user->avatar; 

            //Si l'utilisateur a cliqué sur garder ma session active
            if(isset($_POST['remember_me']) && $_POST['remember_me'] == 'on'){

               remember_me($user->id);

            } 


            redirect_friendly('profile?id='.$user->id);


        }else{

            set_flash("<i class=\"fas fa-exclamation-triangle\"></i> Combinaison Identifiants/Mot de passe Incorrect!",'danger');
            
            save_input_data();
        }

    }else{
           $errors[] = '"<i class="fas fa-exclamation-triangle"></i> Veuillez SVP remplir tous les champs pour vous connecter!';
            save_input_data();
    }
	    

} else{

      clear_input_data();
}

?>

<?php require('views/login.view.php');?>

