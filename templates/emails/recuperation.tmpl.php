<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
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
	    <h1 class="lead "> Réinitialisation de mot de passe </h1>
	    <p>L'utilisateur  <span class="pseudo"><?= $data->pseudo; ?></span>  souhaite réinitialiser son mot de passe<br>
	      Pour réinitialiser  votre mot  de passe veuiller cliquer sur le bouton ci-dessous!<br>
	      Et indiquer le nouveau mot de passe que vous souhaitez!.
       </p>

       <p>Vous n'etes pas à l'origine de cette demande? <br> Ignorez simplement cet email ça n'aura aucun effet mais vous pouvez toutefois changer votre mot de passe <a href="https://alhass.ddns.net/login">Ici</a>
       </p>
	    <a class="btn" href="https://alhass.ddns.net/recuperation?pseudo=<?=$data->pseudo.'&token='.$token ?>">Réinitialiser mon mot de passe </a>
	</div>
    <div class="page-footer"> 

         Copyright &copy Alhass-Social-Network 2020 	
    
     </div>

</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </html>
