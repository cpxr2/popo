<?php
session_start();
$titrePage="Back office - Admin";
if($_SESSION['acces'] == 2)
{
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include '../include/header.php'; ?>
    <link rel="stylesheet" href="../css/backStyle.css">
</head>

<body>

  <h1>Bienvenue <?=$_SESSION['pseudo']?></h1>
  <br />
  <p>Que voulez vous faire ?</p>

    <a href="backCreerJoueur.php"><button class="btn btn-info">Créer un nouveau joueur</button></a><br /><br />
   <a href="backAjoutJeton.php"><button class="btn btn-info">Ajouter des jetons</button></a><br /><br />
   <a href="backModifJoueur.php"><button class="btn btn-info">Modifier joueur</button></a><br /><br />

    <a href="../jeu.php"><button class="btn btn-warning">Partie annonyme</button></a><br /><br />

</body>
</html>
<?php
}
else
{
    echo 'acces non autorisé.';
}
