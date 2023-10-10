<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHAT BY CABREL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"  href="css/style.css">
    <link rel="icon"  href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="body-taillba">

        <form method="post" action="home.php" enctype="multipart/form-data">
            <div class="log">
                <div>
                    <a href="supprimeProfil.php"> Home -Profil </a>

                    <div class="taille">

                        <div class="mp">
                            <img src="<?php echo $avatarPatht; ?>" alt="Avatar" title="orlala" class="imge">
                            <h4><strong><?php echo $pseudoUser; ?></strong></h4>
                        </div>
                        <h3><a href="deconnection.php" class="bouton">Logout</a></h3>
                    </div>


                </div>


        <div class="message-container">
            <?php foreach ($resultat as $message) { ?>
                <div class="message">

                    
                    <img src="imageee/avatar/<?php echo $message['emetteur']; ?>" alt="Avatar" class="mess">
                    <div class="message-content">
                        <div class="message-header">
                            <h5> <span class="<?=$message['genre']?>"><?php echo $message['emetteur']; ?> </span> </h5>
                            <span><?php echo $message['temps']; ?></span>
                        </div>

                        <p><?php echo $message['message']; ?>
                            <?php

                                if($pseudoUser == $message['emetteur'])
                                {?>
                                 
                                    <a href="confirme_supMessage.php?sup=<?=$message['id']?>" class="delete-link"> <img src="image/Delete.png">
                                    </a> 
                                
                           <?php } ?>
                        </p>

                    </div>
                </div>
            <?php } ?>
        </div>
                <div class="input-group"> 
                    <textarea name="message" id="searchText" class="form-control" maxlength="1000"></textarea>
                    <input type="submit" id="searchBtn" name="valider">
                </div>

            </div>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="home.php?page=<?php echo $page - 1; ?>">Précédent</a>
            <?php endif; ?>

            <?php if ($page < $totalPages): ?>
                <a href="home.php?page=<?php echo $page + 1; ?>">Suivant</a>
            <?php endif; ?>
        </div>

        </form>


    </div>
<!-- ------------------------------------------------------------------PARTIE INSTANNEE------------------------------- -->
<!-- ------------------------------------------------------------------Juste pour un test ------------------------------- -->
<!-- <script>
    setInterval(load_messages, 5000);

    function load_messages() {
        $('.taille').load('home.php .taille');
    }
</script> -->
<!-- ------------------------------------------------------------------PARTIE INSTANNEE-------------------------------  -->-->
</body>
</html>
