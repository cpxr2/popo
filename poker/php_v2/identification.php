<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/identification.css">
        <title>Identification</title>
    </head>

    <body>
        <div id="page">

            <h1>Identification</h1>

            <br /><br />

            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" >
                <label>Pseudo : </label><input type="text" name="pseudo" /><br /><br />
                <label>Mot de passe : </label><input type="password" name="mdp" /><br /><br />
                <input class="btn btn-primary" type="submit" name="submit" value="S'indentifier" />
            </form>
        </div>

    </body>
</html>
<?php
    require 'connexion.php';

                  if(isset($_POST['submit']))
                  {

                      $mdp = hash('sha256', $_POST['mdp'], false);
                      $pseudo = $_POST['pseudo'];

                      $requete = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo_util=:pseudo');
                      $requete->execute(array(':pseudo'=>$pseudo));
                      $resultat = $requete->fetch();

                      $acces = $resultat['acces_util'];
                      $joueurMdp = $resultat['mdp_util'];

                      $requete->closeCursor();
                      // On vérifie si la personne qui se connect est dans la BDD utilisateur

                      if($mdp == $joueurMdp)
                      {
                          session_start();

                          $_SESSION['nbJeton'] = $resultat['jeton_util'];
                          $_SESSION['id'] = $resultat['id_util'];
                          $_SESSION['pseudo'] = $resultat['pseudo_util'];
                          $_SESSION['acces'] = $acces;

                          header("location: jeu.php");

                      }
                      else// Sinon on cherche dans la BDD bar
                      {

                          $requete = $bdd->prepare('SELECT * FROM bar WHERE nom_bar=:pseudo');
                          $requete->execute(array(':pseudo'=>$pseudo));
                          $resultat = $requete->fetch();

                          $acces = $resultat['acces_bar'];
                          $barMdp = $resultat['mdp_bar'];

                          if($mdp == $joueurMdp){

                              $_SESSION['acces'] = $acces;
                              $_SESSION['id_bar'] = $resultat['id_bar'];
                              $_SESSION['nom_bar'] = $resultat['nom_bar'];

                              if($acces == 3)
                              {                          
                                  header("location: backAdmin.php"); 
                              }
                              else if($acces == 2)
                              {
                                  $_SESSION['bar']=$resultat['id_bar'];
                                  header("location: backBar.php");
                              }

                              else
                              {
                                  echo '<span id="erreur">Utilisateur inconnu.</span>';
                              }
                          }
                      }
                  }
?>