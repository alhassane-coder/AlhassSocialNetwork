 
 <?php $title='Affichage du code source';?>

 <?php include('partials/_header.php');?>

<body id="code-body">

    <div id="code-main-content">
      
      <div id="main-content-share-code">
      	
        <pre class="prettyprint linenums "> 

          <?= escape($code->code) ; ?> 

       </pre>

        <div class="btn-group" id="btnnav">
            
             <a href="share_code?id=<?= $_GET['id'] ?>" class="btn btn-warning" >Cloner</a>

             <a href="share_code"  class="btn btn-primary" >Nouveau</a>

        </div>

      </div>


    </div>
    
</body>
    <!-- SCRIPTS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
     <script src="assets/js/jquery.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <script src="librairies/alertify/alertify.min.js"></script>


<!-- script pour l'embelissement du code via la librairie prettiffy -->
    <script type="text/javascript">
      
      prettyPrint();

    </script>

   <!-- On affiche une alerte si enregistre avec succès -->

  <?php if(!empty($_SESSION['code_success'])):?> 
    <script type="text/javascript">
         alertify.success('<?= $_SESSION['code_success'] ?>');
    </script>
  
  <?php endif;?>
  <?php $_SESSION['code_success']='';?>

 
</body>
</html>


