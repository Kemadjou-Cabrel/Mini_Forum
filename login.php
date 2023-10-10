<?php
 session_start();

if (isset($_SESSION['pseudoUser'])) 
{
    header("Location: home.php");
}

 include("modele.php");

 $errors = array();


    if(isset($_POST['pseudoUser']) ||
        isset($_POST['password']))
    {
        $_SESSION['succes'] = NULL;

        #Obtenir le formulaire de données après la demande et les stocker dans Variable 
        $pseudoUser= htmlspecialchars( $_POST['pseudoUser']);// permet a utilisateur entre du code html 
        $password= htmlspecialchars( $_POST['password']);
        $ver="";
        
        
        if(empty($pseudoUser))
        {
            $errors['pseudoUser'] = "*Le pseudo doit être complété";
        }


        

        if(empty($password))
        {
            $errors['password'] = "*Le mot de passe doit être complété";
        }


        if(empty($errors))
        {
            $res=login($pseudoUser); 
             
            if(empty($res) )
            {
                $errors['login'] = "*Pseudo Introuvable";

                $_SESSION['errors'] = $errors;

                include("Vue/vue_login.php");

            } 

            else 
            {

                
                $hash = $res[0]['mdp'];


                if (password_verify($password, $hash)) 
                {
                    $_SESSION['pseudoUser']=$pseudoUser;


                    header("Location: home.php");

                    
                } 
                else
                {
                    $errors['login'] = "*Mot de passe Introuvable";

                    $_SESSION['errors'] = $errors;

                    include("Vue/vue_login.php");
                }
            }
        }
        else
        {
            $_SESSION['errors'] = $errors;

            include("Vue/vue_login.php");
        }
	}

    else
    {
        $_SESSION['errors'] = NULL;
        include("Vue/vue_login.php");
        exit;
    }



    
?>