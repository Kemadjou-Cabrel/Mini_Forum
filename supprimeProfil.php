<?php
session_start();

if (!isset($_SESSION['pseudoUser'])) 
{
    header("Location: login.php");
} 


include("modele.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) 
{
    $pseudo = $_SESSION['pseudoUser'];
    
    suppressionpseudo($pseudo);

    session_destroy();

    header("Location: login.php");

    exit;
}

include("Vue/vue_profil.php");




?>