<?php session_start();

require("includes/init.php");
include('filters/auth_filter.php');
require("includes/check_avatar.php");


if(!empty($_GET['id'])){

  // Recuperer les infos sur l'utilisateur en bdd en utilisant son id
  
  $user = find_user_by_id($_GET['id']);
  
 
  if(!$user){
  	set_flash("<i class=\"fas fa-exclamation-triangle\"></i>Mauvais identifiant de l'utisateur!",'danger');
  	redirect('index');

  }else{ 

  	// Si on a trouvé un utilisateur on affiche tous ses status

  	$q=$db->prepare('SELECT id,content,created_at FROM  microposts WHERE user_id=:user_id order by created_at DESC');
  	$q->execute(['user_id'=>$_GET['id']]);
  
  	$microposts = $q->fetchAll(PDO::FETCH_OBJ);
    

  }

}else{
	redirect('profile?id='.get_session('user_id'));

}




 require("views/profile.view.php");






