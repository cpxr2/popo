<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste admins</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="css/backStyle.css">
    </head>

    <body>
        <div class="container">
            <div class="col-lg-12">
                <h1>Liste des admins</h1>       
            </div><br /><br />

            <div class="ligne">
                <div class="nom cell">Nom</div>
                <div class="gain cell">Gain</div>
                <div class="bouton cell">Détail</div>
            </div><br /><br /><br />
            <?php
            require 'connexion.php';

            $requete = $bdd->query('SELECT * FROM admin');
            while($res = $requete->fetch()){
            ?>
            <div class="ligne">
                <div class="nom cell"><?=$res['nom_admin']?></div>
                <div class="gain cell"><?=$res['gain_admin']?></div>
                <div class="bouton cell"><a href="backDetatilAdmin.php?id=<?=$res['id_admin']?>"><button class="btn btn-success btn-xs">Détail</button></a></div>
            </div><br />
            <?php
            }
            ?>

<br /><br />
            <div class="row">
                <div class="col-lg-12">
                    <a href="backPrimary.php"><button class="btn btn-primary">Retour</button></a>
                    <a href="backAjoutJeton.php"><button class="btn btn-warning">Jetons</button></a>
                    <a href="backDeconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>  
        </div>
    </body>
</html>
