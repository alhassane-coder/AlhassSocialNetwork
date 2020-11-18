 
 <?php $title='Accueil';?>
 
 <?php include('partials/_header.php');?>
    
    <div id="main-content">
      
        <div class="container">

          <div class="jumbotron">
                <h1><?= WEBSITE_NAME;?></h1>
                 <?= $long_text['accueil_intro'][$_SESSION['locale']] ;?>
         
          	<div class="row" style="margin-top: 30px;border: 1px solid black;background: #1a81d6;padding: 20">
          		<div class="col-md-4" style="border: 1px solid blue;">

          		    <p><img src="assets/images/pngeg.jpg" style="width:300px; height:300px;" ></p>

          		</div>
          		<div class="col-md-4 well bio" style="background: #002e54 !important;">

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce porta lacus non nunc vehicula, at ultricies est bibendum. Proin pharetra commodo dui, eu faucibus tortor mattis sed. Vivamus nec elit vitae metus gravida interdum. Nulla eget leo ex. Curabitur hendrerit dapibus felis nec rhoncus. In id risus in turpis facilisis iaculis. Proin a felis ex. Curabitur fringilla, ante sed dignissim iaculis, risus enim laoreet mauris, ac dapibus nisi ex nec sapien.

          		</div>
          		<div class="col-md-4" style="border: 1px solid blue;">
          			<div class="row">        				
          				<div class="col-md-4">

          		           <p><img src="assets/images/pnge.png" style="width:150px; height:300px;" ></p>

          				</div>	
          				<div class="col-md-4 col-md-offset-2">

          		           <p><img src="assets/images/pnge.png" style="width:150px; height:300px;" ></p>

          				</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

         	

    

    <?php include('partials/_footer.php');?>

