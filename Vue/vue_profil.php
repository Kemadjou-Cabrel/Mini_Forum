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

	<div class="body-taillee"> 
		<h3>Attention Suppresion de Votre Profil</h3>
		<form method="POST" action="supprimeProfil.php">
			<input type="hidden" name="mod" value="<?php echo $_SESSION['pseudoUser']; ?>">

        	<button type="submit" name="delete">Supprimer le compte</button>

    	</form>
    </div>


</body>
</html>
