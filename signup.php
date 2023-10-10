<?php
session_start();
if (isset($_SESSION['pseudoUser'])) 
{
    header("Location: home.php");
}

 include("modele.php");

 $errors = array();

    if(isset($_POST['pseudoUser']) ||  
        isset($_POST['password']) ||  
        isset($_POST['confirmpassword']) ||
        isset($_POST['sexe']) ||  
        isset($_POST['date_of_birth']) ||
        (isset($_FILES['picture'])))
    {

        #Obtenir le formulaire de données après la demande et les stocker dans Variable 
        $pseudoUser= htmlspecialchars( $_POST['pseudoUser']);// convertir certains caractères spéciaux en entités HTML 

        $password= htmlspecialchars( $_POST['password']);

        $confirmpassword=htmlspecialchars($_POST['confirmpassword']);

        $sexe = htmlspecialchars($_POST['sexe']);

        $date_of_birth=htmlspecialchars($_POST['date_of_birth']);
        
        if(empty($pseudoUser))
        {
            $errors['pseudoUser']="*le pseudo doit etre complete";

        }

        else
        {
            $veri=verifchat($pseudoUser);
            if($veri==2)
            {
                $errors['pseudoUser'] = "*le Pseudo doit avoir entre 8 et 15 caractères";

            }
            else if($veri==1)
            {
                $errors['pseudoUser'] = "*le Pseudo doit etre des caractères imprmable";


            }
            

        }
        

        if(empty($password))
        {
            $errors['password']="*le mot de passe doit etre complete";

        }
        else 
        {
            $veri=verif($password);
            if($veri==2)
            {
                $errors['password'] = "*le password doit avoir entre 8 et 15 caractères";

            }
            else if($veri==1)
            {
                $errors['password'] = "*le password doit entre 8 et 15 caractères, dont au moins une majuscule, au moins une minuscule, au moins un chiffre et au moins un caractère spécial ";


            }

        }

        if(empty($confirmpassword))
        {
            $errors['confirmpassword']="*confirme votre mot de passe";

        }

        if ($password !== $confirmpassword) 
        {
            $errors['confirmpassword']="*le mot de passe et la confirmation de mot de passe ne correspondent pas";

        }

        
        if(empty($sexe))
        {
            $errors['sexe']="*le sexe  doit etre complete";

        }

        if(empty($date_of_birth))
        {
            $errors['date_of_birth']="*la date   doit etre complete";

        }
        else if(strtotime($date_of_birth) > time())
        # pas besoin de verifier si la date est sous format jour/mois/annee
        # Vérifier si la date de naissance est antérieure à la date d'inscription
        {
            $errors['date_of_birth'] = "*La date de naissance doit être antérieure à la date d'inscription.";

        }
        # Calculer l'âge de l'utilisateur en années
        $age = floor((time() - strtotime($date_of_birth)) / 31536000); # 31536000 = nombre de secondes dans une année
        if ($age < 14) 
        {
            $errors['date_of_birth'] = "*Vous devez avoir au moins 14 ans pour utiliser notre chat.";

        }

        if (!empty($_FILES['picture']['name']) ) 
        {


          $tab = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);

          $detected = exif_imagetype($_FILES['picture']['tmp_name']);
          if (in_array($detected, $tab)) 
          {
            list($width, $height) = getimagesize($_FILES['picture']['tmp_name']);// permet de recupere la taille de image en longuer et en largeur 
            if ($width <= 400 && $height <= 400) 
            {
              $repertoire = "../avatar/";
              $file = $repertoire . $_POST['pseudoUser'];
              move_uploaded_file($_FILES['picture']['tmp_name'], $file);// deplacer le fichier vers le chemin 
            } 
            else 
            {
                $errors['picture'] = "*L'image doit être inférieure ou égale à 400 x 400 pixels.";

            
            }
          } 
          else 
          {
            $errors['picture'] = "*L'image doit être au format JPEG ou PNG.";

          }
        } 
        else 
        {
            $errors['picture'] = "*Veuillez sélectionner une image pour votre avatar.";

        }


        if(empty($errors))
        {

            $pseudoUser=htmlentities($_POST['pseudoUser'],ENT_QUOTES,"UTF-8");//htmlentities avec ENT_QUOTES permet de sécuriser la requête pour éviter les injections SQL, UTF-8 pour dire de convertir en ce format

            $password= password_hash($password, PASSWORD_DEFAULT);

            if(mysqli_num_rows($res=InscriptionVerif($pseudoUser))!=0)
            {

                $errors['pseudoUser']= "*Ce pseudo  est déjà utilisé par un autre membre,!! veuillez en choisir un autre svp!!.";

                $_SESSION['errors'] = $errors;

                include("Vue/vue_signup.php");

            }

            else
            {

                InscriptionInsertion ($pseudoUser,$password,$sexe,$date_of_birth);


                // redirection 

                $succes['pseudoUser']= "!!  Inscription Reussir Connectez vous  !!";

                $_SESSION['succes'] = $succes;

                $_SESSION['errors'] = NULL;

                include("Vue/vue_login.php");

                
            }

        }
        else
        {
            $_SESSION['errors'] = $errors;

            include("Vue/vue_signup.php");
        }           
    }

    else
    {
        $_SESSION['errors'] = NULL;
        include("Vue/vue_signup.php");
        exit;
    }



   

?>
