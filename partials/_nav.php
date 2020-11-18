<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  data-target="#myNavbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
              <a class="navbar-brand" href="index"><span class=" <?= set_active('index')?> glyphicon glyphicon-modal-window  "></span>  <?= WEBSITE_NAME ?></a>&nbsp;
         </div>
          <div id="myNavbar" class="collapse navbar-collapse">
               <ul class="nav navbar-nav">
                 
                 <li class="<?= set_active('list_users')?>"><a href="list_users"><span style="font-size: 15px; color: #cf6000;">
                 <i class="fas fa-list"></i></span>&nbsp;<?= $menu['list_users'][$_SESSION['locale']]; ?></a></li>

               </ul>

              <ul class="nav navbar-nav navbar-right ">
                  
                  <li class="<?= set_active('index')?>"><a href="index"><span style="font-size: 15px; color: #cf6000;">
                 <i class="fas fa-home"></i></span> <?= $menu['accueil'][$_SESSION['locale']];?></a></li>

                  <?php if(is_logged_in()) :?>
                  
                      <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <img width="20px" class="img-circle" src="<?= get_session('avatar') ? get_session('avatar') : get_avatar_url(get_session('email')); ?>" alt="Image de profile de <?= get_session('pseudo')?>"> <?= get_session('pseudo') ?><span class="caret"></span>
                         </a> 
                         
                         <ul class="dropdown-menu" role="menu">

                              <li class="<?= set_active('profile')?>">
                                <a href="profile?id=<?= get_session('user_id'); ?>"><span style="font-size: 15px; color: #cf6000;"><span class="glyphicon glyphicon-user"></span></span>  <?= $menu['mon_profil'][$_SESSION['locale']];?></a>
                              </li>
                              
                              <li class="<?= set_active('profile_update')?>">
                                <a href="profile_update?id=<?= get_session('user_id'); ?>"><span style="font-size: 15px; color: #cf6000;"><i class="fas fa-user-edit"></i></span>  <?= $menu['editer_mon_profile'][$_SESSION['locale']];?></a>
                              </li>

                               <li class="<?= set_active('password_update')?>">
                                <a href="password_update?id=<?= get_session('user_id'); ?>"><span style="font-size: 15px; color: #cf6000;"><i class="fas fa-edit"></i></span>  <?= $menu['edit_password'][$_SESSION['locale']];?></a>
                              </li>


                              <li class=" <?= set_active('share_code')?>" ><a href="share_code"><span style="font-size: 15px; color: #cf6000;"><i class="fas fa-share-alt"></i></span>  <?= $menu['share_code'][$_SESSION['locale']];?></a>
                                </li>
                              <li class="divider"></li>
                               <li><a href="logout"><span glyphicon glyphicon-log-out ></span><span style="font-size: 15px; color: #cf6000;"><i class="fas fa-sign-out-alt"></i></span>   <?= $menu['deconnection'][$_SESSION['locale']];?></a></li>
                         </ul>

                      </li>

                  </ul>
                  

                <?php else :?>              
  
                    <li class="<?= set_active('register')?>"><a href="register"></span>
                          <span style="font-size: 15px; color: #cf6000;"><i class="fas fa-user-plus"></i></span>  <?=$menu['inscription'][$_SESSION['locale']];?></a></li>

                        <li><a href="login"><span class=" <?= set_active('login')?>"></span>
                          <span style="font-size: 15px; color: #cf6000;"><i class="fas fa-sign-in-alt"></i></span>  <?= $menu['connection'][$_SESSION['locale']];?></a></li>

                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="caret"></span> <?= $_SESSION['locale']=='fr' ? '<img src="assets/images/france.svg" widh="20px" height="20px">' : '<img src="assets/images/united-states.svg" widh="20px" height="20px">' ?></a>
                            <ul class="dropdown-menu" role="menu">
                              <li>
                                <a href="?lang=fr" class="dropdown-item"><img src="assets/images/france.svg" widh="20px" height="20px"> Francais</a>
                              </li>
                              <li class="divider"></li>
                              <li>
                                <a class="dropdown-item"href="?lang=en"><img src="assets/images/united-states.svg" widh="20px" height="20px"> English</a>
                              </li>
                            </ul>
                          </li>
                

                <?php endif; ?>
            
          </div><!--/.nav-collapse -->
      </div>
</nav>

