<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"  href="css/style.css">
    <link rel="icon"  href="image/logo.png">
</head>

<body>
    <div class="log">
    <h2>Voulez-vous vraiment supprimer?</h2>
    <form method="post" action="confirme_supMessage.php">
        <input type="hidden" name="sup" value="<?php echo $_SESSION['suppression_id']; ?>">
        <button type="submit" name="confirmation" value="oui">Oui</button>
        <button type="submit" name="confirmation" value="non">Non</button>
    </form>
</div>
</body>
</html>