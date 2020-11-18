 <?php $title='Réinitialisation de mot de passe';?>
 <?php include('partials/_header.php');?>

  <form data-parsley-validate method="POST" class="well col-md-6 col-md-offset-3 " >
  	<?php include('partials/_errors.php'); ?>
    <?php include('includes/scripts.php');?>

            <!-- Pseudo or Email-Field -->
         	 
         	<div class="form-group">

                   <p style="font-weight: bold;">
                   	Mot de passe oublié? 
                   </p>
				   <p>Entrez  l'email avec lequel vous vous êtes inscrits pourqu'on puisse vous envoyez un mail de récupération!</p>
				  <div class="row">
					   	<div class="col-md-9">
					   		  <input type="email" class="form-control" id="email"  name="email" required="required" data-parsley-trigger="change">
					   	</div>

					   <div class="col-md-3">

					   <input type="submit" class="btn btn-primary" value="Envoyez " name="reset">
					   	

					   </div>
				   </div>

				    
		    </div>
  <form>


  <?php include('partials/_footer.php');?>

