<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <style>
    	.jumbotron{
              border: 1px solid #e3e3e3;
              padding: 10px;
              background: #e3e3e3;
              outline: none;
              overflow: hidden;}
         .lead{
              font-size: 2em;
              text-align: center;
              border: 1px solid blue;
              padding: 5px;
              background: rgb(79, 161, 255);
              color: white;

         }
         .pseudo{
         	color: rgb(79, 161, 255);
         	text-transform: uppercase;
         	font-style: italic;
         }
         .btn{
         	background: rgb(79, 161, 255);
         	text-decoration: none;
         	border: 1px solid rgb(79, 161, 255);
         	color: white;
         	padding: 5px;
         	text-transform: uppercase;
         	border-radius: 10px;
         	float: right;
         }
         .page-footer{
         	text-align: center;
         	border-top: 1px solid rgb(79, 161, 255);
         	margin-top: 10px;
         	padding: 10px; 
         }
         .btn:hover{
         	background: rgb(0, 24, 89);
         }
         body{
          background: rgba(245, 220, 218);
         }

    </style>

</head>
<body>
	<div class="jumbotron">
	    <h1 class="lead "> Activation de compte </h1>
	    <p>Merci de nous avoir rejoint <span class="pseudo"><?= $pseudo; ?></span> <br>
	      Pour activer votre compte veuiller cliquer sur le bouton ci-dessous!<br>
	      Et connecter-vous ensuite avec votre email ou votre pseudo et le mot de passe que vous avez choisi.
       </p>
	    <a class="btn" href="<?='https://alhass.ddns.net/activation?p='.$pseudo.'&token='.$token ?>">Activer mon compte</a>
	</div>
    <div class="page-footer"> 

         Copyright &copy Alhass-Social-Network 2020 	
    
     </div>

</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </html>
