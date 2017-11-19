

SESSION A PARAMETRER


<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
        $titrePage="Liste des Admins";
        include '../include/header.php';
        ?>
        <link rel="stylesheet" href="../css/backStyle.css">
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
                    <a href="backSA.php"><button class="btn btn-primary">Retour</button></a>
                    <a href="backAjoutJeton.php"><button class="btn btn-warning">Jetons</button></a>
                    <a href="backDeconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
