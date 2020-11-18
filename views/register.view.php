 
 <?php $title='Inscription';?>

 <?php include('partials/_header.php');?>
    
    <div id="main-content">
      
      <div class="container">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-primary">
                <div class="panel-heading">
                   
                   <h3 class="panel-title text-center">Devenez dès à présent membre!</h3>

                </div>
                <div class="panel-body">

                 
                       <?php include('partials/_errors.php'); ?>
                       <?php include('includes/scripts.php');?>

                         <form  method="POST" data-parsley-validate class="well" >

                         <!--Name Field -->
                       	 
                       	<div class="form-group">
              				    <label class="control-label" for="name">Nom:</label>
              				    <input type="text" class="form-control" id="name" value="<?= get_input('name') ?>"name="name" required="required" >
              				    
              		   </div>
                         
                          <!-- Pseudo  Field -->
                       	 
                       	<div class="form-group">
              				    <label class="control-label" for="pseudo">Prénom:</label>
              				    <input type="text" class="form-control" id="pseudo" value="<?= get_input('pseudo') ?>" name="pseudo" required="required" data-parsley-minlength="3" data-parsley-trigger="change">
              				    
              		   </div>

                       	
                           <!-- Email Field -->
                       	 
                       	<div class="form-group">
              				    <label class="control-label" for="Email">Addresse Email:</label>
              				    <input type="email" class="form-control" id="Email" data-parsley-trigger="keypress" value="<?= get_input('email') ?>" name="email" required="required">
              				    <small id="emailHelp" class="form-text text-muted" >On ne partagera votre email avec personne d'autre.</small>
              		   </div>
                            
                          <!--Password Field -->
                       	 
                       	<div class="form-group">
              				    <label class="control-label" for="password">Mot de passe :</label>
              				    <input type="password" class="form-control" id="password"  name="password" required="required"  data-parsley-minlength="6" data-parsley-trigger="keypres">
              				    
              		     </div>

              		    <!--Password Confirmation-->
                       	 
                       	<div class="form-group">
              				    <label class="control-label" for="password_confirm">Confirmer Mot de passe :</label>
              				    <input type="password" class="form-control" id="password_confirm" name="password_confirm" required="required" data-parsley-equalto="#password" data-parsley-trigger="keypress">
              				    
              		    </div>




                          <input type="submit" class="btn btn-primary" value="Inscription" name="register">
                         
                          <p >
                            <h5 class="text-center">Vous avez déja un compte compte?</h5>
                            <div class="text-center" ><a  href="login">Connectez-vous!</a></div>
                          </p>


                       </form>
                  </div>
              </div>
          </div>
        
      </div><!-- /.container -->


    </div>
    

    <?php include('partials/_footer.php');?>

