<!DOCTYPE html>
<?php 
//starting the session
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["association"]);
?>
<html lang="fr">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Contrôle d'Accès exclusif</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Identifiez-vous</h3>
		<!-- Ajout séparateur -->			
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-6">
	<div>
		<!-- Login Form Starts -->
			<form method="POST" action="login_query.php"> 	
						
				<div class="form-group">
					<label>Prénom ou Pseudo...</label>
					<input type="text" name="username"  class="form-control" required="required"/> 
				</div>
				<div class="form-group">
					<label>Mot de passe (EN MAJUSCULE)</label>
					<input type="password" name="password"  class="form-control"/> 
				</div>
						
				<?php
					//checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
					if(ISSET($_SESSION['error'])){
					?>
					<!-- Display Login Error message -->
						<div><?php echo $_SESSION['error']?></div>
					<?php
						//Unsetting the 'error' session after displaying the message. 
						session_unset();
						}
					?>					
					<center><button name="login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider...</button></center>
			</form>	
			<!-- Login Form Ends -->				
		</div>	
	</div>
</body>
</html>