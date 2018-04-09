<?php $titre = 'Identification'; ?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php include 'include/header.php'; ?>
        <link rel="stylesheet" href="css/backStyle.css">
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
    require 'backOffice/connexion.php';

                  if(isset($_POST['submit']))
                  {
                      $joueurMdp="";
                      $mdp = hash('sha256', $_POST['mdp'], false);
                      $pseudo = $_POST['pseudo'];

                      $requete = $bdd->prepare('SELECT * FROM joueur WHERE nom_jou = :pseudo');
                      $requete->bindParam(':pseudo', $pseudo);
                      $requete->execute();

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
                          $_SESSION['partieTemp'] = false;
                          $_SESSION['reload'] = false;

                          header("location: jeu.php");

                      }
                      else// Sinon on cherche dans la BDD bar
                      {

                          $req = $bdd->prepare('SELECT * FROM admin WHERE nom_admin = :pseudo');
                          $req->bindParam(':pseudo', $pseudo);
                          $req->execute();
                          $resultat = $req->fetch();

                          $acces = $resultat['acces_admin'];
                          $adminMdp = $resultat['mdp_admin'];

                          if($mdp == $adminMdp){
                              session_start();

                              $_SESSION['acces'] = $acces;
                              $_SESSION['id_admin'] = $resultat['id_admin'];
                              $_SESSION['pseudo'] = $resultat['nom_admin'];
                              $_SESSION['reload'] = false;


                              if($acces == 3)
                              {
                                  header("location: backOffice/backSA.php");
                              }
                              else if($acces == 2)
                              {
                                  $_SESSION['bar']=$resultat['id_bar'];
                                  header("location: backOffice/backAdmin.php");
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
