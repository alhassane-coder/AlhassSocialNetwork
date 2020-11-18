<?php 
session_start();
include('filters/auth_filter.php');
require("includes/init.php");



//Si le formulaie a été soumis ;
if(isset($_POST['send'])){

  if(!empty($_POST['content'])){

    extract($_POST);

    //Si tout est bon on enregistre le post dans la base de donnée

    $q = $db->prepare('INSERT INTO  microposts(content,user_id) VALUES(:content,:user_id) ');
    $q->execute([
     'content'=>$content,
     'user_id'=>get_session('user_id')
    ]);
    set_flash('<i class="fas fa-check-circle"></i>  Votre status a été mis à jour.','success');

  }else{

       set_flash("Votre statut est vide et n'a donc pas été posté","warning");

        redirect('profile?id='.get_session('user_id'));

  }

      
}
 redirect('profile?id='.get_session('user_id'));
