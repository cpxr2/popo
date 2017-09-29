<?php
//****** POUR CACHER LES ERREURS *****

//ini_set("display_errors",0);error_reporting(0);

session_start();

if($_SESSION['acces'] == 3)
{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu Back office</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="css/backStyle.css">
    </head>

    <body>

        <h1>Bienvenue <?=$_SESSION['pseudo']?></h1>
        <br />
        <p>Que voulez vous faire ?</p>

        <a href="backCreerAdmin.php"><button class="btn btn-info">Créer un nouveau admin</button></a><br /><br />
        <a href="backListAdmin.php"><button class="btn btn-info">Liste des admins</button></a><br /><br />
        <a href="backModifJoueur.php"><button class="btn btn-info">Modifcation joueur</button></a><br /><br />

        <a href="jeu.php"><button class="btn btn-info">Jouer</button></a><br /><br />
        <script src=""></script>
    </body>
</html>
<?php
}
else
{
    echo 'Accés non autorisé.';
}
