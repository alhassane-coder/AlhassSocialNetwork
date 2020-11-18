<?php


if(isset($errors) && count($errors) != 0){ 
   echo '<div class="alert alert-danger">
		   <span class="closebtn">&times;</span>';
		   
		    if(count($errors)==1){
		    echo '<span style="background: rgba(204, 14, 40,0.4); padding:5px;border-radius:5px"> Une erreur a été rencontrée !</span><br><br>';
		    }else{
		    	  echo '<span style="background: rgba(204, 14, 40,0.4); padding:5px;border-radius:5px">'. count($errors) .' erreurs ont été rencontrées !</span><br><br>';
		    }            
  
    foreach ($errors as $error) {
		                	
		echo $error .'<br>';
		                	
		                	
	
     }
	     echo '</div>';

}
