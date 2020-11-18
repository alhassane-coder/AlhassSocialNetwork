
<?php if(isset($_SESSION['notification']['message'])):?>

<div class="container">
    <div class="alert <?= $_SESSION['notification']['type'] ?>">
		  <span class="closebtn">&times;</span>  
		  <h4><?= $_SESSION['notification']['message'] ?></h4>
   </div>
</div>
<?php include('includes/scripts.php');?>

<?php endif;
$_SESSION['notification']=[];?>


