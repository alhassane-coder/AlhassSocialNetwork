<?php session_start();
 
require("includes/init.php");

if(isset($_POST['reset'])){
   
   if(!empty($_POST['email'])){

       if(is_already_in_use('email',$_POST['email'],'users')){

           $errors=[];

          if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
             {
                $errors[]='<i class="fas fa-exclamation-triangle"></i> Addresse email invalide!';
             }
             if(count($errors) == 0){
               
               //On cherche le pseudo dans la base de donnée
                $q=$db->prepare('SELECT pseudo FROM users WHERE email=? ');
                $q->execute([$_POST['email']]);
                $data = $q->fetch(PDO::FETCH_OBJ);

                   //Si tout est bon on envoi un mail de récuperation
           
                    $from='alhassane@alhass.ddns.net';

                    $to = $_POST['email'];

                    $subject = WEBSITE_NAME .'-Réinitialisation de mot de passe';

                    $token = sha1($_POST['email'].$data->pseudo);
        
                    ob_start();

                    require('templates/emails/recuperation.tmpl.php');

                    //On enregistre tout dans $content
                   
                    $content = ob_get_clean();

                    $headers[] = "From:" . $from;
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1';   
                    if(mail($_POST['email'], $subject, $content,implode("\r\n", $headers))){
                         
                          set_flash("Mail de récupération envoyé avec succès <i class=\"fas fa-check-circle\"></i><br>Vérifiez votre boite mail ou jettez un coup d'oeil dans le dossier spam et cliquer sur le lien pour Réinitialiser votre mot de passe . ",'success'); 
                              
                          redirect('login');                 
  

                    }

             }
        
   } else {
    
    $errors[]='<i class="fas fa-exclamation-triangle"></i> Votre addresse email n\'existe pas dans notre système!';

   }
   
   }

}

require("views/forgot_password.view.php");

