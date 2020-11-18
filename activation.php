<?php session_start();

require("includes/init.php");
include('filters/guest_filter.php');

if(!empty($_GET['p']) &&

 is_already_in_use('pseudo',$_GET['p'],'users')

  && !empty($_GET['token'])

){

	$pseudo = $_GET['p'];

	$token= $_GET['token'];

	$q=$db->prepare('SELECT email,password FROM users where pseudo = ?');

	$q->execute([$pseudo]);

	$data=$q->fetch(PDO::FETCH_OBJ);

    $token_verif= sha1($pseudo.$data->email.$data->password);

    if($token == $token_verif){

     // On active l'utilisateur si tout est ok:

     $q=$db->prepare("UPDATE users SET active='1' WHERE pseudo = ? ");

     $q->execute([$pseudo]);

      set_flash("<i class=\"fas fa-check-circle\"></i>Compte activé avec succès connectez-vous avec le formulaire ci-dessous");
      redirect('login');

    }else{

    	set_flash("<i class=\"fas fa-exclamation-triangle\"></i>Token de vérification invalide réessayer SVP l'inscription  ",'danger');
    	redirect('index');
    }

}else{
	redirect('index');
}
