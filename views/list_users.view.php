 
 <?php $title='Liste des utilisateurs';?>

 <?php include('partials/_header.php');?>
    
    <div id="main-content">   
      <div class="container-fluid">

          <h1 class=" well bio lead text-center"> Liste des utilisateurs</h1>    
       
        <?php foreach (array_chunk($users, 4) as $user_set) :?>

            <div class="row users">
                <?php foreach ($user_set as $user) :?>
        
                 <div class="user-bloc col-md-3 col-xs-6">
                        <a href="profile?id=<?=$user->id ;?>"> 
                             <img width="90" class="img-circle avatar" src="<?= $user->avatar ? $user->avatar :  get_avatar_url($user->email,'100') ?>" alt="Image de profile de <?= escape($user->pseudo);?>">
                        </a>
     
                         <h4 class="user-bloc-username">

                          <a class="lead text-center" href="profile?id=<?=$user->id ;?>">                 
                            <?= escape($user->pseudo) ;?>

                          </a>

                         </h4>
                </div>
      
               <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
        <div id="pagination"><?= $pagination ?> </div>
      </div>
    </div>

    <?php include('partials/_footer.php');?>

