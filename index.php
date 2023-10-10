<?php
session_start();  

    include("modele.php");  

    if(isset($_SESSION['pseudoUser']))

    {

      header("location: home.php");

    }

    else

    {

        header("location: login.php");

    }
?>