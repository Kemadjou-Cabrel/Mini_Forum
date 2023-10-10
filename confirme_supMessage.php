<?php
session_start();

if (!isset($_SESSION['pseudoUser'])) 
{
    header("Location: login.php");
}

include("modele.php");

if (isset($_GET['sup'])) 
{
    $id = $_GET['sup'];

    $_SESSION['suppression_id'] = $id;

    
    include("Vue/vue_confirme.php");
    
    exit;
}

if (isset($_POST['confirmation']) && $_POST['confirmation'] === 'oui') 
{
    $id = $_POST['sup'];

    suppression($id);

    header("Location: home.php");

    exit;
} 
else 
{
    if(isset($_POST['confirmation']) && $_POST['confirmation'] === 'non')
    {

        header("Location: home.php");
        exit;
    }

}







?>