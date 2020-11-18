<?php session_start();
 
 require("includes/init.php");
 include('filters/auth_filter.php');

if(!empty($_GET['id'])){

//On supprime le micropost indiqué à l'url
 extract($_GET); 

 $q = $db->prepare('DELETE FROM microposts WHERE id=?');
 $sucess=$q->execute([$id]);
if($sucess){
	$_SESSION['deleted']='deleted';
  set_flash('Status ppprimé avec succès');
  redirect('profile?id='.get_session('user_id'));

}else{
    set_flash('Echec lors de la suppression du status','warning');
      redirect('profile?id='.get_session('user_id'));

}
    


}else{

  redirect('profile?id='.get_session('user_id'));
}









