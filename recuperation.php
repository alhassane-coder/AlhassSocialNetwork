<?php session_start();

require("includes/init.php");
if(isset($_GET['p']) && isset($_GET['token'])){
	extract($_GET);
	if(is_already_in_use('pseudo',base64_decode($p),'users')){

		// Si tout est bon on peut tester le token et montrer la page de nouveau mot de passe s
		$q=$db->prepare('SELECT email from users where pseudo=?');

		$q->execute([base64_decode($p)]);

		$data=$q->fetch();

    extract($data);

		$token_verif=sha1($email.base64_decode($p));

		if($token_verif == $token){
          // On redirige l'utilisateur dans la page ou il pourra choisir un nouveau mot de passe
            redirect('new_password?p='.base64_encode($p));

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
