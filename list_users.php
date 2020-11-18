<?php session_start();
 require("bootstrap/locale.php");
 require("config/database.php");
 require('includes/constants.php');
 require("includes/functions.php");


//On determine le nombre d'utilisateurs par page

$userByPage=16;
//On determine le nombre total d'utilisateurs
$q=$db->query("SELECT COUNT(*) as number_users from users WHERE active='1'");
$data=$q->fetch(PDO::FETCH_OBJ);
$totalUsers= $data->number_users;

if($totalUsers >=0){
		//Calculons le nombre de pages

		$lastPage = ceil($totalUsers/$userByPage);

		//Determinons la position de l'utilisateur
		if(isset($_GET['page']) && is_numeric($_GET['page'])){

			$pageActuelle=$_GET['page'];
			
		}else{
			$pageActuelle=1;
		}

		if($pageActuelle <1){
			$pageActuelle=1;
		}
		else if($pageActuelle >=$lastPage){
				$pageActuelle = $lastPage;
		}

		//Determinons la limite de la requete

		$nombreDeDepart= ($pageActuelle-1)*$userByPage;
		$nombreArrive =$userByPage;



		$q=$db->query("SELECT avatar,id,pseudo,email,name FROM users where active='1' ORDER BY pseudo LIMIT $nombreDeDepart, $nombreArrive");

		$users=$q->fetchAll(PDO::FETCH_OBJ);


		$pagination ='<nav class="text-center" ><ul class="pagination">';

		if($pageActuelle > 1 ){
				$previous = $pageActuelle-1;
				$pagination .='<li><a href="list_users?page='.$previous.'"><span aria-hidden="true">&laquo;</span>
		        <span class="sr-only">Previous</span></a>&nbsp;&nbsp;';
			
		}
		//Affichons les liens sur les pages 

		for($i=1;$i<$lastPage;$i++){

				if($i == $pageActuelle){

			        $pagination .= '<li class="active"><a href="#">'.$pageActuelle.'</a></li>';

				} else {

				  	 $pagination .='<li><a href="list_users?page='.$i.'">'.$i.'</a></li>';

				}

		}
		if($pageActuelle < $lastPage){

			$next = $pageActuelle+1;
			$pagination .='<li><a href="list_users?page='.$next.'"><span aria-hidden="true">&raquo;</span>
		        <span class="sr-only">Next</span></a></li>';


		}
		$pagination.='</ul></nav>';

} else {

		set_flash('Aucun utilisateur pour le moment....','warning');
	}



 require("views/list_users.view.php");






