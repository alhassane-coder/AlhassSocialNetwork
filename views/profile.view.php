
 <?php $title='Page de Profil';?>

 <?php include('partials/_header.php');?>

    <div id="main-content">
      <div class="container-fluid">
      	<div class="row">
      		<div class="col-md-7">
      			 <div class="panel panel-primary">
    					  <div class="panel-heading">
      					   <h3 class="panel-title">Profile de <?= escape($user->pseudo).' '.escape($user->name);?></h3>
    					  </div>
					       <div class="panel-body">

                          <div class="row">

	                            <div class="col-md-5">
	                            	<a href="<?= $user->avatar ? $user->avatar : get_avatar_url($user->email,'130') ?>" target="_blank" ><img width="130" class="img-circle" src="<?= $user->avatar ? $user->avatar : get_avatar_url($user->email,'130') ?>" alt="Image de profile de <?= escape($user->pseudo);?>">
                                </a>

	                            </div>
                          </div>
                          <div class="row">

								            <div class="col-md-6 col-xs-6">
                            	 	<strong><?= escape($user->pseudo).' '.escape($user->name);?></strong><br>
                            		<a href="mailto:<?= escape($user->email);?>" title="Ecrire un mail à <?= escape($user->pseudo); ?>" ><?= escape($user->email);?></a><br>
                                   <?=
                                     $user->city || $user->country

                                     ? "<i class=\"fas fa-location-arrow\"></i>&nbsp;".escape($user->city) ." - ".escape($user->country)."<br>  <i class=\"fas fa-search-location\"></i>&nbsp;<a href=\"https://maps.google.com?q=".escape($user->city)."&nbsp;".escape($user->country)." target=\"_blank\" title=\"Voir la localisation exacte\">Voir sur Maps</a>"
                                     :  '';

                            	      ?>



                            	</div>
                            	<div class="col-md-6 col-xs-6">

                            	 <?=
                                  $user->twitter ? '<i class="fab fa-twitter"></i>  <a href="//twitter.com/'.escape($user->twitter).'"> @'.escape($user->twitter).'</a><br>' : '';

                            	 ?>
                            	 <?=
                                  $user->facebook ? '<i class="fab fa-facebook"></i>&nbsp;<a href="//facebook.com/'.escape($user->facebook).'">  '.escape($user->facebook).'</a><br>' : '';

                            	 ?>
                            	 <?=
                                  $user->github ? '<i class="fab fa-github"></i>&nbsp;<a href="//github.com/'.escape($user->github).'"> '.escape($user->github).'</a><br>' : '';

                            	 ?>
                            	 <?=
                                  $user->sex =="M" ? '<i class="fas fa-male"></i>&nbsp;' : '<i class="fas fa-female"></i>&nbsp;';
                            	 ?>
                            	 <?=
                                  $user->available_for_hiring ? "Recherche du job " : "Déjà employé";

                            	 ?>

                            	</div>


                          </div>
                          <div class="row">
                          	<div class="col-md-12 well bio">

                              		<h4><span class="glyphicon glyphicon-book" aria-hidden="true">&nbsp;</span><strong>Qui est <?= escape($user->pseudo).' '.escape($user->name);?> ? </strong></h4>
                              		<p>
                              		<?=
                                      $user->bio ? nl2br(escape($user->bio))

                                      : "<i class=\"fas fa-exclamation-circle\"></i>  Aucune Biographie pour le moment.....";

                                	  ?>

                              		</p>
                                  <?php if ($_GET['id'] == get_session ('user_id') ) : ?>
                                      <strong><i class="fa fa-clock-o"></i>&nbsp; Vous avez  rejoint <time class="created_at" datetime="<?= $user->created_at ?>"></time></strong>

                                  <?php else : ?>
                                    <strong><i class="fa fa-clock-o"></i>&nbsp; A rejoint <time class="created_at" datetime="<?= $user->created_at ?>"></time></strong>

                                  <?php endif; ?>

                          	</div>

                          </div>

					  </div>
		        </div>
      		</div>
      <?php if(!empty($_GET['id']) && $_GET['id'] == get_session('user_id')):?>
          <div class="col-md-5">
                <div class="post-status">

                    <form action="insert_post.php" method="POST" data-parsley-validate>
                      <div class="form-group">

                          <label for="content" class="sr-only">Status:</label>
                          <textarea name="content" id="content" class="form-control" maxlength="400" rows="5" cols="8" placeholder="Alors Quoi de neuf <?= $user->pseudo ?>?" required="required" data-parsley-minlength="2" data-parsley-maxlength="400" ></textarea>

                     </div>
                      <div class="form-group status-post-submit">

                       <input type="submit" name="send" class="btn btn-primary" value="Publier">

                     </div>
                  </form>

              </div>

      <?php endif; ?>
                <?php if(count($microposts) != 0) :?>
                  <?= $_GET['id']==get_session('user_id') ? '' : '<div class="col-md-5">'  ?>
                        <?php foreach ($microposts as $micropost) : ?>

                         <?php include('partials/_microposts.php'); ?>

                        <?php endforeach; ?>
                <?php else:?>
                          <?= $_GET['id']==get_session('user_id')

                           ? '<div class="text-center">

                                <p><i class="fas fa-exclamation-circle"></i>  Vous  n\'avez aucun post pour l\'instant ....</p>
                                <p><img src="assets/images/pngegg.png" style="width:300px; height:300px;" title="Aucun post"><p>
                              </div>'

                           : '<div class="col-md-5 text-center">

                                <p><i class="fas fa-exclamation-circle"></i>  Cet utilisateur n\'a aucun post pour l\'instant ....</p>
                                <p><img src="assets/images/pngegg.png" style="width:300px; height:300px;" title="Aucun post"><p>

                             </div>'

                           ?>
                <?= $_GET['id']==get_session('user_id') ? '' : '</div>'  ?>


              <?php endif;  ?>
      </div>
  </div>


  </div><!-- /.container -->


    </div>


 <!-- SCRIPTS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="librairies/Parsley/parsley.min.js"></script>
    <script src="librairies/Parsley/i18n/fr.js"></script>
    <script src="librairies/timeago/jquery.timeago.js"></script>
    <script src="librairies/timeago/jquery.timeago.fr.js"></script>
    <script src="librairies/alertify/d.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
      $("time.timeago").timeago();
      });
    </script>

     <script type="text/javascript">
        $(document).ready(function() {
      $("time.created_at").timeago();
      });
    </script>


  <!-- Message de succès après modification de mot de passe -->

    <?php if(!empty($_SESSION['success'])):?>
    <script type="text/javascript">
         alertify.success('<?=$_SESSION['success']?>');
    </script>

  <?php endif;?>
  <?php $_SESSION['success']='';?>

  <!-- Message de succès après connection -->

   <?php if(!empty($_SESSION['connected'])):?>
    <script type="text/javascript">
         alertify.warning('<?= $_SESSION['connected'] ?>');
    </script>

  <?php endif;?>
  <?php $_SESSION['connected']='';?>



