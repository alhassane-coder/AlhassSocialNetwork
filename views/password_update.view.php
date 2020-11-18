
<?php $title='Modification de mot de passe';?>

<?php include('partials/_header.php');?>

<div class="main-content">
			
			<div class="container">
			
				<div class="row">
					
					<?php if(!empty($_GET['id'] && $_GET['id']==get_session('user_id'))):?>

					<div class="col-md-6 col-md-offset-3">

						<div class="panel panel-primary">
						    <div class="panel-heading">
						       
						       <h3 class="panel-title text-center">Changer votre mot de passe</h3>

						    </div>

							<div class="panel-body">
								   <!-- Affichage des erreurs  -->
							   
									<?php include('partials/_errors.php'); ?>
									<?php include('includes/scripts.php');?>


								 <form  method="POST" data-parsley-validate class="well col-md-12 " autocomplete="off" >

										 	<!--Current Password Field -->
							         	 
							         	<div class="form-group">
											    <label class="control-label" for="password">Mot de passe actuel :</label>
											    <input type="password" class="form-control" id="current_password"  name="current_password" required="required"  data-parsley-minlength="6" data-parsley-trigger="keypres">
											    
									     </div>

									     <!--New Password Field-->
							         	 
							         	<div class="form-group">
											    <label class="control-label" for="new_password">Nouveau Mot de passe :</label>
											    <input type="password" class="form-control" id="new_password" name="new_password" required="required"  data-parsley-trigger="keypress" data-parsley-minlength="6">
											    
									    </div>

									    <!--New Password Confirmation-->
							         	 
							         	<div class="form-group">
											    <label class="control-label" for="new_password_confirm">Confirmer Mot de passe :</label>
											    <input type="password" class="form-control" id="new_password_confirm" name="new_password_confirm" required="required" data-parsley-equalto="#new_password"data-parsley-trigger="keypress">
											    
									    </div>

									    <input class="btn btn-primary pull-right" type="submit" name="change_password" value="Enregistrer">

								 </form>
						</div>

					  </div>
					
					</div>

					<?php endif;?>

				</div>
							

			</div>



</div>

  <?php include('partials/_footer.php');?>
