 
 <?php $title='Partage de code source';?>

 <?php include('partials/_header.php');?>


<body id="code-body">

    <div id="code-main-content">
      
      <div id="main-content-share-code">
      	
      	<form action="" method="POST" autocomplete="off">
      		
      	    <textarea name="code" id="code" placeholder="Entrer votre Code ici ..."><?= escape($code) ?></textarea> 
      		
      		<div class="btn-group" id="btnnav">
      			
      			  <a href="share_code"  class="btn btn-danger" >Tout Effacer!</a>

      		     <input type="submit"  class="btn btn-success" name="save" value="Enregistrer">
  
      		</div>
        
           
      	</form>

      </div>


    </div>
    
</body>
    <!-- SCRIPTS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
     <script src="assets/js/jquery.js"></script>
    <script src="assets/js/boostrap.min.js"></script>
    <script src="assets/js/tabby.js"></script>
    
    <script>
     
     $("#code").tabby();
     $("#code").height($(window).height() - 50);
   
    </script>

    <script src="librairies/alertify/alertify.min.js"></script>
 
 <!-- On affiche une alerte si aucun code entré -->

  <?php if(!empty($_SESSION['empty_code'])):?> 
    <script type="text/javascript">
         alertify.error('<?= $_SESSION['empty_code']?>');
    </script>
  
  <?php endif;?>
  <?php $_SESSION['empty_code']='';?>


</body>
</html>


