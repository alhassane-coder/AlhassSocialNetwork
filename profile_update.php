
<?php session_start();
require("includes/init.php");
require("includes/check_avatar.php");


if( !empty($_GET['id'])){

  if( $_GET['id'] != get_session('user_id')){

    set_flash("<i class=\"fas fa-exclamation-circle\"></i> Attention vous ne pouvez modifier que votre profil.<br>On ne dois jamais toucher à ce qui ne nous appartient pas 😎️",'warning');
    redirect('profile?id='.get_session('user_id'));
  }

  if(isset($_POST['update'])){

    $errors=[];

    if(not_empty(['name','email','city','country','sex','pseudo'])){

     extract($_POST);

     if(mb_strlen($name)<3)
     {
            $errors[]='<i class="fas fa-exclamation-triangle"></i> Nom trop court! (Minimum 3 caractères)';
     }
      if(mb_strlen($pseudo)<3)
     {
        $errors[]='<i class="fas fa-exclamation-triangle"></i> Pseudo trop court! (Minimum 3 caractères)';
     }

      if(!filter_var($email,FILTER_VALIDATE_EMAIL))
      {
            $errors[]='<i class="fas fa-exclamation-triangle"></i> Addresse email invalide!';
      }

     if(mb_strlen($country)<3)
     {
            $errors[]='<i class="fas fa-exclamation-triangle"></i> Nom de Pays trop court! (Minimum 3 caractères)';
     }

     if(count($errors) == 0){

        // Si tout va bien on mets à jour ses infos en bdd et le redirige vers son profil

        $q = $db->prepare('UPDATE users set name=:name ,email=:email, city=:city ,country=:country, sex=:sex,pseudo=:pseudo, github=:github, facebook=:facebook, twitter=:twitter, bio=:bio ,available_for_hiring=:available_for_hire  WHERE id=:id');
        $q->execute(array(
           'name'=>$name,
           'email'=>$email,
           'city'=>$city,
           'country'=>$country,
           'pseudo'=>$pseudo,
           'sex'=>$sex,
           'github'=>$github,
           'facebook'=>$facebook,
           'twitter'=>$twitter,
           'available_for_hire'=>!empty($available_for_hire) ? '1' :'0',
           'bio'=>$bio,
           'id'=>get_session('user_id')
        ));


        // Rédirigeons l'utilisateur vers son profil si tout s'est bien passé

        set_flash('<i class="fas fa-check-circle"></i>&nbsp;Vos informations ont été mis à jour!');
        redirect('profile?id='.get_session('user_id'));


     }



  }else{
    $errors[]='<i class="fas fa-exclamation-triangle"></i> Tous les champs avec un (*) sont obligatoires';
    save_input_data();
  }


}else{
  clear_input_data();
}


}else{
  redirect('profile_update.php?id='.get_session('user_id'));
}


 $user = find_user_by_id($_GET['id']);

 if(!$user){
    set_flash("<i class=\"fas fa-exclamation-triangle\"></i>Mauvais identifiant de l'utisateur!",'danger');
    redirect('index');
  }

 require("views/profile_update.view.php");
