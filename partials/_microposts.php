 <article class="micropost-media media">
	  <div class="pull-left">
	      <img width="25px" src="<?= $user->avatar ? $user->avatar : get_avatar_url($user->email,'130'); ?>" alt="<?= $user->pseudo ?>" class="media-object">
	  </div>
	  <div class="media-body">
	      <h4 class="media-heading"><?= escape($user->pseudo) ?></h4>
	       <p><i class="fa fa-clock-o"></i> <time class="timeago" datetime="<?= $micropost->created_at ?>"></time></p>
	       <span class="status-content"><?= nl2br(escape($micropost->content)) ?></span>
	     
	     <?php if(!empty($_GET['id']) && $_GET['id'] == get_session('user_id')):?>
	       
		       <a id="status-link" class="btn btn-default btn-xs pull-right" href="status_delete?id=<?= $micropost->id ?>" onclick="return confirm('Voulez vous vraiment supprimer ce micropost?');">Supprimer
	           </a>

	  	<?php endif;?>


	  </div>          
</article>
