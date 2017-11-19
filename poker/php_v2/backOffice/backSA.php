<?php
//****** POUR CACHER LES ERREURS *****

//ini_set("display_errors",0);error_reporting(0);

session_start();
$titrePage="Super Admin";
if($_SESSION['acces'] == 3)
{
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <?php include '../include/header.php'; ?>
        <link rel="stylesheet" href="../css/SAStyle.css">
    </head>

    <body>
        <div class="container">

        <?php include 'backSANavBar.php'; ?>
        <h1>Bienvenue <?=$_SESSION['pseudo']?></h1>
        <br />
        <p>Que voulez vous faire ?</p>

        <a href="backCreerAdmin.php"><button class="btn btn-info">Créer un nouveau bar</button></a><br /><br />
        <a href="backListAdmin.php"><button class="btn btn-info">Liste des bars</button></a><br /><br />
        <a href="backModifJoueur.php"><button class="btn btn-info">Modifcation joueur</button></a><br /><br />

        <a href="../jeu.php"><button class="btn btn-info">Jouer</button></a><br /><br />
        
    </div>
    </body>
    </html>
    <?php
}
else
{
    echo 'Accés non autorisé.';
}
