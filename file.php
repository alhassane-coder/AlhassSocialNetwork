<?php session_start();

require("includes/init.php");

$file= $_FILES['myFile'];

// Verifions que le fichier a bien été envoyé et qu'il n'y a pas d'erreur

if(!empty($file) && !empty($_POST) AND $file['error']==0)
{
	// Verifions que le fichier n'est pas trop grand

	  if ($file['size'] <= 5000000)
	 {
	 	//Testons si l'extension est autorisée

        $targetFolder = 'uploads/'.$_SESSION['pseudo'];

        $infofile= pathinfo($file['name']);

        $extension_uploaded= $infofile['extension'];

        $randomFileName = substr('ASN'.md5(uniqid(rand())),0,10).'.'.$extension_uploaded;

        $extension_valide = array('jpg','jpeg','gif','svg','png');

        if(in_array($extension_uploaded, $extension_valide))
		{
			$filePath=$targetFolder.'/'.$randomFileName;

            if(!file_exists($targetFolder)){

                mkdir($targetFolder);
               chmod($targetFolder,0777);

            }

            // On peut desormais  enregistrer le fichier et le stocker definitivement

           if(move_uploaded_file($file['tmp_name'],$filePath)){

             chmod($filePath,0777);


            //Enregistrons le chemin de sauvegarde de l"avatar en base de donnée et mettons le en session

			$q=$db->prepare('UPDATE users SET avatar=:avatar WHERE id=:user_id ');
            $q->execute([
            	'avatar'=>$filePath,
            	'user_id'=>$_POST['user_id']
            ]);

             $_SESSION['avatar']=$filePath;

            //Variable session pour utiliser la librairie alertify

            $_SESSION['alert']='alert';

    		redirect('profile_update?id='.get_session('user_id'));


	       }
        } else {

            //Variable session pour utiliser la librairie alertify

             $_SESSION['file_type_error'] = '<i class="fas fa-exclamation-circle"></i>  Catégories de fichier non supporté.<br>Extensions supportées : jpg , jpeg , gif , svg ,png ';

    		redirect('profile_update?id='.get_session('user_id'));

        }
    } else {
         //Variable session pour utiliser la librairie alertify

         $_SESSION['size_error']='<i class="fas fa-exclamation-circle"></i>  Image trop grande .<br>Choisissez-en une autre et  Réessayez!';

    	redirect('profile_update?id='.get_session('user_id'));

    }
} else {
        //Variable session pour utiliser la librairie alertify

    	$_SESSION['error']='<i class="fas fa-exclamation-circle"></i>  Aucune image selectionée.<br>Choisissez-en une et réessayez!';

        redirect('profile_update?id='.get_session('user_id'));
}

