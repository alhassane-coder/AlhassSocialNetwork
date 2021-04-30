<?php

// Recupère les informations en session;

if(!function_exists('get_session')){

	function get_session($key){
		if($key){
			return !empty($_SESSION[$key])

         	? escape($_SESSION[$key])

         	: null;

		}
	}

}

//Ceil count

// Retourne le nombre d'enregistrement en bdd tout en
// respectants certaines conditions


if(!function_exists('ceil_count')){

 function ceil_count($table,$field,$value){

 	global $db;

 	$q = $db->prepare("SELECT * FROM $table WHERE $field = ?");

 	$q->execute([$value]);

 	return $q->rowCount();
 }

}


//Systeme de remember me securisé

if(!function_exists('remember_me')){

	function remember_me($user_id){

 		//On genere un token de manière aleatoire

          $token=openssl_random_pseudo_bytes(24);

		// Générer un selector de manière aleatoire tant qu'elle existe donc
		//  veuiller à ce qu'elle soit unique;
         do {

         	$selector = openssl_random_pseudo_bytes(9);

         } while(ceil_count('auth_tokens','selector',$selector) > 0);

		//Inserer ces infos en base de donnée (selector,expires(14jours),user_id,token(hashed))

         global $db;

         $q = $db->prepare('INSERT INTO auth_tokens(expires, selector , user_id , token) VALUES(DATE_ADD(NOW(), INTERVAl 14 DAY) , :selector , :user_id, :token)');

         $q->execute([

          'selector'=>$selector,
          'user_id'=>$user_id,
          'token'=>hash('sha256', $token)

         ]);

		//Creer un cookie auth de durée 14jours httponly=true secure=true
         //Contenu base_encode(selector) : base_encode(token);

          setcookie('auth',
          	base64_encode($selector) .':'.base64_encode($token) ,
          	 time()+ 3600*24*14,
          	 null,
          	 null,
          	 true,
          	 false);
    }

}

// Auto login pour le connecter automatiquement si le cookie existe

if(!function_exists('auto_login')){

  function auto_login(){

		  global $db;

		//On Verifie si le cookie auth existe
		if(!empty($_COOKIE['auth'])){

			//On recupère les deux valeurs concaténées

			$split = explode(':',$_COOKIE['auth']);

			// S'assurer qu'on aura que deux elements

			if(count($split) != 2){

				return false;
			}

			$selector = $split[0];

			$token = $split[1];

			//On pouvait faire au lieu de la ligne precedente
			// Cela reviendrai a la meme chose

			//  list($selector,$token) = $split;

			//On recupère les enregistrements en base de donnée
			//oû selector = $selector;

			$q = $db->prepare('SELECT auth_tokens.user_id,auth_tokens.token,users.pseudo,users.email,users.avatar
				              FROM auth_tokens
						 	  LEFT JOIN users
			                  ON auth_tokens.user_id=users.id
							  WHERE selector = ?  AND expires >= CURDATE()');

			$q->execute([base64_decode($selector) ]);

			$data = $q->fetch(PDO::FETCH_OBJ);


			if($data){

				//Si tout est bon on compare les tokens
				if(hash_equals($data->token,hash('sha256', base64_decode($token)))){

					// On Sauvegarde ses informations en sessions
					session_regenerate_id(true);

						$_SESSION['user_id']= $data->user_id;
			       $_SESSION['pseudo']= $data->pseudo;
			       $_SESSION['email']= $data->email;
            $_SESSION['avatar']=$data->avatar;


			        return true;


				}


			}

    }

        return false;

   }


}

//Redirection de l'utilisateur sur la page desirée lorsqu'il n'est pas connectée;
if(!function_exists('redirect_friendly')){

	function redirect_friendly($default_url){
		if($_SESSION['forwading_url']){

            $url = $_SESSION['forwading_url'];

		} else{

			$url = $default_url;

		}
		$_SESSION['forwading_url']=null;
		redirect($url);
	}

}


 //Filtre les données  saisies par l'utilisateur
if(!function_exists('escape')){

	function escape($string){
		if($string){
			return htmlspecialchars($string);
		}
	}

}

// Verifie si les champs du formulaire ne sonts pas vides;

if(!function_exists('not_empty'))
{


		function not_empty($fields=[]){

			if(count($fields) != 0)
			{
				foreach ($fields as $field) {

					if(empty($_POST[$field]) || trim($_POST[$field]) == ""){

		             return false;

			       }

			    }
			    return true;
			}

	    }

  }

// Verifie si le pseudo et l'email sont pas déja dans notre base de donnée

if(!function_exists('is_already_in_use')){

	function is_already_in_use($field, $value, $table){

		  global $db;

		  $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");

		  $q->execute([$value]);

		  $count = $q->rowCount();

		  $q->closeCursor();

		  return $count;

	}

}



// Affichage de message flash

if(!function_exists('set_flash')){

	function set_flash($message,$type='info'){

		$_SESSION['notification']['message']=$message;
		$_SESSION['notification']['type']=$type;

	}

}

// Redirige l'utilisateur sur la page donnée en paramètre


if(!function_exists('redirect')){
	function redirect($page){

		header('Location:'.$page);
		exit();
	}
}

// Stocke les inputs du formualaire de manière temporaire  en session

if(!function_exists('save_input_data')){

	function save_input_data(){
      foreach ($_POST as $key => $value) {
      	if(strpos($key, 'password')==false){

      		$_SESSION['input'][$key]=$value;

      	}


      }
	}
}

//Recupère les inputs du formualaire stockés de manière temporaire  en session

if(!function_exists('get_input')){

	function get_input($key){


         	return !empty($_SESSION['input'][$key])

         	? escape($_SESSION['input'][$key])

         	: null;

	}

}

//Supprimer les données en sesssion dès que l'utilisateur a fini l'inscription
if(!function_exists('clear_input_data')){

	function clear_input_data(){
		if(isset($_SESSION['input'])){

			$_SESSION['input']= [] ;
	   }

    }

 }


 //Gère l'etat actif de nos différents liens de navigation

if(!function_exists('set_active')){
	function set_active($path){

		$page=explode('/', $_SERVER['SCRIPT_NAME']);

		$page_filtered=array_pop($page);

		if($page_filtered == $path.'.php'){

			return "active";

		}else{

			return "";

	     }

	}

}

// Rechercher toutes les données de l'utilisateur avec son id;

if(!function_exists('find_user_by_id')){

	function find_user_by_id($id){

		global $db;

		$q=$db->prepare("SELECT name,pseudo,email,twitter,facebook,github,sex,bio,country,city,avatar,available_for_hiring,created_at FROM users WHERE id=? ");

		$q->execute([$id]);

        $data =$q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;

    }

 }


// Obtenir le lien gravatar pour la photo


 if(!function_exists('get_avatar_url')){

 	function get_avatar_url($email,$size='25px'){

  return "http://gravatar.com/avatar/".md5(strtolower(trim(escape($email))))."?d=mp"."&s=".$size;
 	}
 }

 // Verifie si l'utilisateur est connecté
// La fonction retourne true si vraie et false si faux

 if(!function_exists('is_logged_in')){

 	function is_logged_in(){

 		return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);

 	}
 }


// Rechercher toutes les codes par id;

if(!function_exists('find_code_by_id')){

	function find_code_by_id($id){

		global $db;

		 $q=$db->prepare('SELECT code from codes where id = ?');

      	 $q->execute([$id]);

         $code = $q->fetch(PDO::FETCH_OBJ);


        $q->closeCursor();

        return $code;

    }

 }

 //Detecte la langue
if(!function_exists('get_current_locale')){

	function get_current_locale(){

			return $_SESSION['locale'];
		}
	}


//Verifie l'existence de l'avatar

if(!function_exists('check_if_avatar_exist')){

	function check_if_avatar_exist($filename){

		global $db;

    if(file_exists($filename)){
    	 $q=$db->prepare("UPDATE users set avatar=? WHERE id=? ");
	     $q->execute([get_session('avatar'),get_session('user_id')]);

	    return true;

    }else{

         $q=$db->prepare("UPDATE users set avatar='' WHERE id=? ");
	     $q->execute([get_session('user_id')]);

	   $_SESSION['avatar']='';

	   return false;

    }


	}


}
