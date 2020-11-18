
<?php session_start();

require('config/database.php');

//Supprimer les entrées au niveau de  auths_token en bdd

$q = $db->prepare('DELETE FROM auth_tokens WHERE user_id=:user_id');

$q->execute(['user_id'=>$_SESSION['user_id']]);
 
//Supprimer les cookie et vider les sessions

setcookie('auth','', time()-3600);

session_destroy();

$_SESSION=[];

//Redirection

header('Location: login');

exit;

?>