<?php

session_start();


if (!isset($_SESSION['pseudoUser'])) 
{
    header("Location: login.php");
} 



include("modele.php");

$va=recuperation($_SESSION['pseudoUser']);
                       
$pseudoUser = $va[0]['pseudo'];




$avatarPatht = 'imageee/avatar/' . $pseudoUser;

if(isset($_POST['valider'])) 
{

    $message = htmlspecialchars($_POST['message']);

    if(empty($message)) 
    {
        echo "*veillez entre votre message ";

     
       
    }
    else
    {
        $veri=verifchat($message);

        if($veri==1)
        {
            echo "*le message doit etre des caractères imprimable";
        }
        else
        {
            $pseudoUser=htmlspecialchars($pseudoUser);

            insertion($message,$pseudoUser);
            header("Location: home.php");
        }


    }
 
}

    

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    $limit = 20;

    $resultat = recuper($page, $limit);

    $totalMessages = recupererationmess()[0]['count(*)'];

    $totalPages = ceil($totalMessages / $limit);



    if (isset($_GET['sup'])) 
    {
        $messageId = $_GET['sup'];
        
        
        suppression($messageId);
        
        
        header("Location: home.php");
        
        exit; 
    }



    include("Vue/vue_accueil.php");




?>
