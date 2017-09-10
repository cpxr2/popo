<?php
session_start();
if($_SESSION['acces'] == 3)
{
?>

<!--******************** HTML HEAD ****************************-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Créer un joueur</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="css/creerUtilisateur.css">
    </head>
    <body>
        <!--***************** FIN HTML ******************************-->

        <?php
    if(!isset($_POST['creer']))
    {
        ?>
        <!--*********************** HTML FORMULAIRE ***********************-->
        <div class="container" id="page">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Créer un nouveau joueur</h1>
                    <br /><br />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" id="pseudo" name="pseudo" />
                        </div>

                        <div class"form-group">
                            <label for="mdp">Mot de passe</label>
                            <input type="password" id="mdp" name="mdp" />             
                        </div>
                        <br />

                        <input type="submit" class="btn btn-primary" name="creer" value="créer" />
                    </form>
                    <br /><br />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="back.php"><button class="btn btn-primary">Retour</button></a>
                    <a href="ajoutJeton.php"><button class="btn btn-warning">Jetons</button></a>
                    <a href="deconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>
        </div>
        <!--***************** FIN HTML ******************************-->
        <?php
    }
    else
    {
        require 'connexion.php';

        $pseudo = $_POST['pseudo'];
        $mdp = hash('sha256', $_POST['mdp'], false);

        $requete = $bdd->prepare('INSERT INTO utilisateur(pseudo_util, mdp_util, jeton_util, acces_util) VALUES (:pseudo, :mdp, 0, 1)');
        $requete->execute([':pseudo'=>$pseudo, ':mdp'=>$mdp]);
        ?>

        <!--****************** HTML CONFIRMATION ********************-->
        <div class="container" id="page">
            
            <div class="row">
                <div class="col-lg-12">
                    <p id="confirmation">Nouveau joueur créée.<br />
                    Pensez à lui ajouter des jetons.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="back.php"><button class="btn btn-primary">Retour</button></a>
                    <a href="ajoutJeton.php"><button class="btn btn-warning">Jetons</button></a>
                    <a href="deconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>
        </div>
        <!--***************** FIN HTML ******************************-->
        <?php
    }
        ?>
    </body>
</html>


<?php        
}
else
{
    echo 'acces non autorisé.';
}
?>