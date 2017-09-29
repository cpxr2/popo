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
                <label>Pseudo : </label><input type="text" name="pseudo" /><br /><br />
                <label>Mot de passe : </label><input type="password" name="mdp" /><br /><br />
                <input class="btn btn-primary" type="submit" name="submit" value="S'indentifier" />
            </form>

            <?php
    require 'connexion.php';

                  if(isset($_POST['submit']))
                  {
                      $joueurMdp="";
                      $mdp = hash('sha256', $_POST['mdp'], false);
                      $pseudo = $_POST['pseudo'];

                      $requete = $bdd->prepare('SELECT * FROM joueur WHERE nom_jou = :pseudo');
                      $requete->execute(array(':pseudo'=>$pseudo));
                      $resultat = $requete->fetch();

                      $acces = $resultat['acces_jou'];
                      $joueurMdp = $resultat['mdp_jou'];

                      $requete->closeCursor();
                      // On vérifie si la personne qui se connecte est dans la BDD utilisateur

                      if($mdp == $joueurMdp)
                      {
                          session_start();

                          $_SESSION['nbJeton'] = $resultat['jeton_jou'];
                          $_SESSION['id'] = $resultat['id_jou'];
                          $_SESSION['pseudo'] = $resultat['nom_jou'];
                          $_SESSION['acces'] = $acces;

                          header("location: jeu.php");

                      }
                      else// Sinon on cherche dans la BDD bar
                      {

                          $req = $bdd->prepare('SELECT * FROM admin WHERE nom_admin = :pseudo');
                          $req->execute(array(':pseudo'=>$pseudo));
                          $resultat = $req->fetch();

                          $acces = $resultat['acces_admin'];
                          $adminMdp = $resultat['mdp_admin'];

                          if($mdp == $adminMdp){
                              session_start();

                              $_SESSION['acces'] = $acces;
                              $_SESSION['id_admin'] = $resultat['id_admin'];
                              $_SESSION['pseudo'] = $resultat['nom_admin'];


                              if($acces == 3)
                              {                          
                                  header("location: backPrimary.php"); 
                              }
                              else if($acces == 2)
                              {
                                  $_SESSION['bar']=$resultat['id_bar'];
                                  header("location: backAdmin.php");
                              }

                          }
                          else
                          {
                              echo '<span id="erreur">Utilisateur inconnu.</span>';
                          }
                      }
                  }
            ?>
        </div>

    </body>
</html>