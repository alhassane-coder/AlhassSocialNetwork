
 <?php $title='Mis à jour du Profil';?>

 <?php include('partials/_header.php');?>

    <div id="main-content">
      <div class="container-fluid">
      	<div class="row">
      		<div class="col-md-4">
      			 <div class="panel panel-primary">
					  <div class="panel-heading">
					     <h3 class="panel-title">Profile de <?= escape($user->pseudo).' '.escape($user->name);?></h3>
					  </div>
					  <div class="panel-body">

                          <div class="row">

	                            <div class="col-md-4 col-xs-5">
	                            	<img width="130" class="img-circle" src="<?= $user->avatar
	                            	? $user->avatar : get_avatar_url($user->email,'130') ?>" alt="Image de profile de <?= escape($user->pseudo);?>">

	                            </div>
                              <div class="col-md-8 col-xs-7 ">
                                	<div class="form-group">
                                		 <form method="POST" action="file.php" enctype="multipart/form-data">
                                		 	<input type="hidden" name="user_id" value=<?= get_session('user_id');?>>
				                 			 <label class="btn btn-primary"> <i class="fa fa-image"></i> Changer l'avatar<input type="file" style="display: none;" name="myFile"> </label>
				                 		 	<input type="submit" class="btn btn-success" value="Enregistrer">
				             		 	</form>
				             		 	<h4 class="small" style="color: red">(Taille maximale: 5Mo;)</h4>
				             		 	<h4 class="small" style="color: red">Extensions supportées: jpg, jpeg, png, svg, gif</h4>

                                   </div>
                              </div>

                          </div>
                      <div class="row">

						  	<div class="col-md-5">
                            	  <strong><?= escape($user->pseudo).' '.escape($user->name);?></strong><br>
                            	  <a href="mailto:<?= escape($user->email);?>"><?= escape($user->email);?>

                            	  </a>
                        	</div>

                      </div>


					  </div>
		        </div>
      		</div>
      		<div class="col-md-8">
                <div class="panel panel-primary">
					  <div class="panel-heading">
					     <h3 class="panel-title">Completer mon profil</h3>
					  </div>
					  <div class="panel-body">
					  <?php include('partials/_errors.php'); ?>
					   <?php include('includes/scripts.php');?>
						  <form method="POST" autocomplete="off" class="well" data-parsley-validate>
						  	<div class="row">
						  		<div class="col-md-6">
						  			<div class="form-group">
						  				<label for="Name">Nom<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?= get_input('name')? get_input('name') : escape($user->name);?>" >
						  			</div>
						  		</div>
						  		<div class="col-md-6">
						  			<div class="form-group">
						  				<label for="city">Email<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"   value="<?= get_input('email') ? get_input('email') : escape($user->email);?>">
						  			</div>
						  		</div>
						  		<div class="col-md-6">
						  			<div class="form-group">
						  				<label for="city">Prénom<span class="text-danger">*</span></label>
                                        <input type="text" name="pseudo" id="email" class="form-control"  value="<?= get_input('pseudo')  ? get_input('pseudo'): escape($user->pseudo);?>">
						  			</div>
						  		</div>

                                <div class="col-md-6">
						  			<div class="form-group">
						  				<label for="city">Ville<span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="city" class="form-control"   value="<?= get_input('city') ?  get_input('city') : escape($user->city);?>">
						  			</div>
						  		</div>
						  		 <div class="col-md-6">
						  			<div class="form-group">
						  				<label for="city">Pays<span class="text-danger">*</span></label>
                                        <input type="text" name="country" value="<?= get_input('country') ?  get_input('country') : escape($user->country);?>" id="county" class="form-control" >
						  			</div>
						  		</div>
						  		 <div class="col-md-6">
						  			<div class="form-group">
						  				<label for="sexe">Sexe</label>
                                        <select name="sex" id="sexe" class="form-control">
                                        	<option value="M" <?= $user->sex=='M' ? 'selected' : '';?>>
                                        	Homme
                                        	</option>
                                        	<option value="F" <?= $user->sex=='F' ? 'selected' : '';?>>
                                        	Femme
                                        	</option>
                                      </select>
						  			</div>
						  		</div>
						  		<div class="col-md-6">
						  			<div class="form-group">
						  				<label for="twitter">Twitter</label>
                                        <input type="text" name="twitter" id="twitter" class="form-control"  value="<?= get_input('twitter') ? get_input('twitter')  : escape($user->twitter);?>">
						  			</div>
						  		</div>
						  		<div class="col-md-6">
						  			<div class="form-group">
						  				<label for="github">Github</label>
                                       <input type="text" name="github" id="github"  value="<?= get_input('github') ?  get_input('github') : escape($user->github);?>"class="form-control">
						  			</div>
						  		</div>
						  		<div class="col-md-6">
						  			<div class="form-group">
						  				<label for="city">Facebook</label>
                                        <input type="text" name="facebook" id="facebook" class="form-control" value="<?= get_input('facebook') ?  get_input('facebook') : escape($user->facebook);?>">
						  			</div>
						  		</div>
						  		<div class="col-md-6">
						  			<div class="form-group">
						  				<input type="checkbox" name="available_for_hire"
						  				<?= $user->available_for_hiring ? 'checked' : ''?>>
						  				<label for="available_for_hire"><br><br>
						  					Disponible pour emploi?
						  				</label>

						  		    </div>
						  	   </div>


						 </div>



						 <div class="row">
						 	<div class="col-md-12">
						  			<div class="form-group">
						  				<label for="biographie">Biographie</label>
						  				<textarea name="bio" id="bio" cols="30" rows="10" class="form-control" ><?= get_input('bio') ?: escape($user->bio);?></textarea>

						  			</div>
						  	</div>
						 </div>

                            <input type="submit" class="btn btn-primary" value="Valider" name="update">

						 </form>


					  </div>
		        </div>

      		</div>
      	</div>


      </div><!-- /.container -->

<!-- SCRIPTS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="assets/js/boostrap.min.js"></script>
    <script src="librairies/Parsley/parsley.min.js"></script>
    <script src="librairies/Parsley/i18n/fr.js"></script>
    <script src="librairies/timeago/jquery.timeago.js"></script>
    <script src="librairies/timeago/jquery.timeago.fr.js"></script>
     <script src="librairies/alertify/alertify.min.js"></script>

   <!--On montre une alerte de succès si l'image a été uplodé -->

  <?php if(!empty($_SESSION['alert'])):?>
		<script type="text/javascript">
		     alertify.success('<i class="fas fa-check-circle"></i> Votre image a été changée avec success!');
		</script>

  <?php endif;?>
  <?php $_SESSION['alert']='';?>

<!--   On affiche une alerte d'echec si echec -->

<?php if(!empty($_SESSION['error'])):?>
		<script type="text/javascript">
		     alertify.error('<?= $_SESSION['error'] ?>');
		</script>

  <?php endif;?>
  <?php $_SESSION['error']='';?>

<!-- On affiche une alerte de taille si taille trop grande  -->

  <?php if(!empty($_SESSION['size_error'])):?>
		<script type="text/javascript">
		     alertify.error('<?= $_SESSION['size_error'] ?>');
		</script>

  <?php endif;?>
  <?php $_SESSION['size_error']='';?>


  <!-- On affiche une alerte si le type est pas supporté -->

  <?php if(!empty($_SESSION['file_type_error'])):?>
		<script type="text/javascript">
		     alertify.error('<?= $_SESSION['file_type_error']?>');
		</script>

  <?php endif;?>
  <?php $_SESSION['file_type_error']='';?>


</div>
