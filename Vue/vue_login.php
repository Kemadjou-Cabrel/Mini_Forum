<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> LOGIN  </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet"  href="css/style.css">
	<link rel="icon"  href="image/logo.png">
</head>

<body>
	<div class="body-taille"> 


		<form method="post"action="login.php">
		  <div class= "flex">
		  	<img src="image/logo.png" alt="cabrel" title="orlala" class="img">
		  	<link rel="icon"  href="image/logo.png">

		  	<h3> <u> <strong>LOGIN</strong></u> </h3>

		   </div>

		   <div >
		   	<!-- renvoie la première valeur du tableau -->
		    <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>

		        <div class="alert alert-warning" role="alert" style="color:red;">
		            <?= reset($_SESSION['errors']) ?>

		        </div>

		    <?php endif; ?>

		    <?php if (isset($_SESSION['succes']) && !empty($_SESSION['succes'])): ?>

		        <div class="alert alert-succes" role="alert" style="color:limegreen;">
		            <?= reset($_SESSION['succes']) ?>

		        </div>

		    <?php endif; ?>

		  <div class="mb">
		  	<label for="pseudoUser" class="form-label">
		  		Pseudo :
		  	</label>
		  	<input type="text" class="form-control" id="pseudoUser" name="pseudoUser" >

		  </div>
		  <div class="mb1">
		    <label for="password" class="form-label"> Password: 
		    </label>

		    <input type="password" class="form-control"
		   id="password" name="password"   >

		  </div>


		  
		  <button type="submit" class="btn btn-primary">LOGIN</button>

		  <a href="signup.php"> Sign Up  </a>
		</form>


	</div>

</body>
</html>

