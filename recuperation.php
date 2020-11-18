<?php session_start();
 
require("includes/init.php");
if(isset($_GET['pseudo']) && isset($_GET['token'])){
	extract($_GET);
	if(is_already_in_use('pseudo',$pseudo,'users')){

		// Si tout est bon on peut tester le token et montrer la page de nouveau mot de passe si tout est bon
		$q=$db->prepare('SELECT email from users where pseudo=?');
		$q->execute([$pseudo]);
		$data=$q->fetch();
        extract($data);
		$token_verif=sha1($email.$pseudo);
		if($token_verif == $token){
          // On redirige l'utilisateur dans la page ou il pourra choisir un nouveau mot de passe 
            redirect('new_password?pseudo='.$pseudo);

		} else {
		
				set_flash("<i class=\"fas fa-exclamation-triangle\"></i>Token de vérification invalide réessayer SVP la réinitialisation du mot de passe  ",'danger');
    	        redirect('login');
		}


	}else{
		set_flash('L\'utilisateur de l\'url se trouve pas en base de donnée','warning');
		redirect('index');
	}
} else {
	redirect('index');
}
