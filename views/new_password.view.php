 
 <?php $title='Nouveau mot de passe';?>

 <?php include('partials/_header.php');?>
    
    <div id="main-content">
      
      <div class="container">

        <div  class="border border-primary">
            
         <h1 id="login-lead" class="lead text-center">Choisissez un nouveau mot de passe et connectez-vous</h1>

        </div>
          
         
         <?php include('partials/_errors.php'); ?>
         <?php include('includes/scripts.php');?>

           <form data-parsley-validate method="POST" class="well col-md-6 col-md-offset-3 " >
       
            <!--Password Field -->
         	 
         	<div class="form-group">
				    <label class="control-label" for="password">Nouveau Mot de passe :</label>
				    <input type="password" class="form-control" id="new_password"  name="new_password" required="required"  data-parsley-minlength="6" data-parsley-trigger="keypres">
				    
		      </div>
          
            <!--Confirm Password Field -->
           
          <div class="form-group">
            <label class="control-label" for="new_password_confirm">Confirmer Nouveau Mot de passe :</label>
            <input type="password" class="form-control" id="new_password_confirm"  name="new_password_confirm" required="required"  data-parsley-minlength="6" data-parsley-trigger="keypres" data-parsley-equalto='#new_password'>
            
          </div>

            <input type="submit" class="btn btn-primary" value="Appliquer" name="change_password">
  
         </form>
        
      </div><!-- /.container -->


    </div>
    

    <?php include('partials/_footer.php');?>

