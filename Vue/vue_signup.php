<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> SIGN UP  </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet"  href="css/style.css">
	<link rel="icon"  href="image/logo.png">
</head>

<body>
	<div class="body-taille"> 

		<form method="post"action="signup.php" enctype="multipart/form-data">
		  <div class= "flex">
		  	<img src="image/logo.png" alt="cabrel" title="orlala" class="img">
		  	<h3> <u> <strong>SIGN UP </strong></u> </h3>

		   </div> 

			
		   	<!-- renvoie la première valeur du tableau -->
		    <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>

		        <div class="alert alert-warning" role="alert" style="color:red;">
		            <?= reset($_SESSION['errors']) ?>
		        </div>
		       

		    <?php endif; ?>
		


		  <div class="mb">
		  	<label for="pseudoUser" class="form-label">
		  		Pseudo :
		  	</label>
		  	<input type="text" class="form-control" id="pseudoUser" name="pseudoUser"  >

		  </div>
		  <div class="mb1">
		    <label for="password" class="form-label"> Password: 
		    </label>

		    <input type="password" class="form-control"
		   id="password" name="password"  >

		  </div>
		  <div class="mb1">
		    <label for="confirmpassword" class="form-label"> Confirm password: </label>
		    <input type="password" class="form-control"
		    id="confirmpassword" name="confirmpassword"  >

		  </div>

		 <div class="mb">
		  <label  for="sexe" class="form-label">Sexe:</label>

		  <div class="form-check">
		    <input class="form-check-input" type="radio" name="sexe" id="H" value="H" checked>
		    <label class="form-check-label" for="H">Homme</label>
		  </div>
		  <div class="form-check">
		    <input class="form-check-input" type="radio" name="sexe" id="F" value="F">
		    <label class="form-check-label" for="F">Femme</label>
		  </div>
		  <div class="form-check">
		    <input class="form-check-input" type="radio" name="sexe" id="S" value="S">
		    <label class="form-check-label" for="S">Sans Réponse </label>
  		  </div>
		 </div>

		  <div class="mb">
		    <label for="date_of_birth"  class="form-label"> Date of birth: </label>
		    <input type="date" class="form-control"
		    id="date_of_birth" name="date_of_birth" >

		  </div>

		  <div class="mb">
		    <label for="picture" class="form-label"> Profile-picture: </label>
		    <input type="file" class="form-control"
		   id="picture" name="picture" >

		  </div>  
		  
		  <button type="submit" class="btn btn-primary">Sign Up</button>

		  <a href="login.php"> Login  </a>
		</form>
	</div>

</body>
</html>
