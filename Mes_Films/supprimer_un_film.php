<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Supprimer un film</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div id="page">
            <header>
                <h1>Supprimer un film</h1>
            </header>
            <nav>
                <?php include 'navigation.php'; ?>
            </nav>
            <div id="corp_page">
                <?php

                require'connexion.php';

                if(isset($_GET['id'])){



                    $requete= $bdd->prepare('SELECT * FROM mes_films WHERE ID=:id');
                    $requete->execute(array(':id'=>$_GET['id']));
                    $resultat=($requete->fetch());

                    $id = $resultat['ID'];
                    $titre = $resultat['titre'];
                    $real = $resultat['realisateur'];
                    $annee = $resultat['annee'];
                    $acteur = $resultat['acteur'];
                    $support = $resultat['support'];
                    $qualite = $resultat['qualite'];
                    $langue = $resultat['langue'];
                    $genre = $resultat['genre'];
                    $imdb = $resultat['imdb'];

                ?>
                <div class="alerte"><img src="images/danger.png"/> Attention !!! Vous allez effacer un film !!!</div>

                <form class="formulaire" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                    <input type="hidden" name='id' value="<?=$id ?>" />
                    <label>Titre : </label><input type="text" disabled name="titre" value="<?=$titre?>" /><br />
                    <label>Réalisateur : </label><input type="text" disabled name="realisateur" value="<?=$real?>" /><br />
                    <label>Année : </label><input type="text" disabled name="annee" value="<?=$annee?>" /><br /><br />
                    <input type="submit" value="Effacer" name="effacer" />
                    <a href="Tous_les_Films.php"><input type="button" value="Annuler"/></a>

                </form>
                <?php

                    $requete->closeCursor();
                }else if(isset($_POST['effacer'])){

                    $req = $bdd->prepare('DELETE FROM mes_films WHERE ID=:id');
                    $req->execute(array(':id'=>$_POST['id']));
                    $req->closeCursor();
                ?>
                <div class="ajout">
                    <p>Le film a bien été effacé.</p><br />
                    <a href="Tous_les_Films.php"><button>Retour</button></a>
                </div>
                <?php
                } else {
                ?>
                <div class="erreur">
                    <p>Vous ne pouvez pas acceder à cette page comme cela.</p>
                    <a href="Tous_les_Films.php"><button>Retour</button></a>
                </div>
                <?php
                }

                ?>
            </div>
        </div>
    </body>
</html>
