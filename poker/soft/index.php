<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/backStyle.css">
        <title>Identification</title>
    </head>

    <body>
        <div id="page">

            <h1>Identification</h1>

            <br /><br />

            <form method="post" id="identification" action="<?php $_SERVER['PHP_SELF'] ?>" >
                <label>Email : </label><input type="text" name="email" /><br /><br />
                <label>Mot de passe : </label><input type="password" name="mdp" /><br /><br />
                <input class="btn btn-primary" type="submit" name="submit" value="S'indentifier" />
            </form>
            <br />
            <br />
            <a href="backCreerCompte.php">Créer un compte.</a>
            <br />

            <?php
    require 'connexion.php';

                  if(isset($_POST['submit']))
                  {
                      $joueurMdp="";
                      $mdp = hash('sha256', $_POST['mdp'], false);
                      $email = $_POST['email'];

                      $requete = $bdd->prepare('SELECT * FROM users WHERE email_user = :email');
                      $requete->execute(array(':email'=>$email));
                      $resultat = $requete->fetch();

                      $acces = $resultat['acces_user'];
                      $joueurMdp = $resultat['mdp_user'];

                      $requete->closeCursor();
                      // On vérifie si la personne qui se connecte est dans la BDD utilisateur

                      if($mdp == $joueurMdp)
                      {
                          session_start();

                          $_SESSION['nbJeton'] = $resultat['jeton_user'];
                          $_SESSION['id'] = $resultat['id_user'];
                          $_SESSION['pseudo'] = $resultat['pseudo_user'];
                          $_SESSION['acces'] = $acces;

                          header("location: jeu.php");

                      }
                      
                          else
                          {
                              echo '<span id="erreur">Utilisateur inconnu.</span>';
                          }
                      }
                  
            ?>
        </div>

    </body>
</html>