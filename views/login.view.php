 
 <?php $title='Connection';?>

 <?php include('partials/_header.php');?>
    
    <div id="main-content">
      
      <div class="container">

        <div  class="border border-primary">
            
         <h1 id="login-lead" class="lead text-center">Connectez-Vous</h1>

        </div>
          
         
         <?php include('partials/_errors.php'); ?>
         <?php include('includes/scripts.php');?>

           <form data-parsley-validate method="POST" class="well col-md-6 col-md-offset-3 " >

            <!-- Pseudo or Email-Field -->
         	 
         	<div class="form-group">
				    <label class="control-label" for="pseudo">Pseudo ou Addresse Email:</label>
				    <input type="text" class="form-control" id="pseudo" value="<?= get_input('pseudo') ?>" name="credentials" required="required" data-parsley-minlength="3" data-parsley-trigger="change">
				    
		   </div>

              
            <!--Password Field -->
         	 
         	<div class="form-group">
				    <label class="control-label" for="password">Mot de passe :</label>
				    <input type="password" class="form-control" id="password"  name="password" required="required"  data-parsley-minlength="6" data-parsley-trigger="keypres">
				    
		      </div>
          
          <!-- Remember me Field -->

          <div class="form-group">
            <label class="control-label" for="session_active">
                 <input type="checkbox" id="session_active"  name="remember_me" checked="" />
                 Garder ma session active
            </label>
          </div>

            <input type="submit" class="btn btn-primary" value="Connection" name="login">
            <p>
              <h5 class="text-center">Vous avez oublié votre mot passe ?
                <a  href="forgot_password">Réinitialisez!</a>
              </h5>
            </p>

            <p>
              <h5 class="text-center">Vous n'avez pas encore de compte?<br>
                <a  href="register">Rejoignez-nous!</a>
              </h5>
            </p>



         </form>
        
      </div><!-- /.container -->


    </div>
    

    <?php include('partials/_footer.php');?>

