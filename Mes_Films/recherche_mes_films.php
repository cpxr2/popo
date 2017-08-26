<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Rechercher un Films</title>
        <link href="style.css" rel="stylesheet"/>
        <style>
            td{text-align: center;}
        </style>
    </head>

    <body>

        <div id="page">

            <header>
                <h1>Rechercher un film</h1>
            </header>
            <div id="corp_page">
                <nav>
                    <?php include 'navigation.php' ?>
                </nav>

                <?php
                    require 'fonction.php';
                    require 'connexion.php';

                    if(isset($_POST['envoyer'])) //Réglage des variables pour la requète SQL
                    {
                        if(empty($_POST['titre']))
                        {
                            $titre = '%';
                        } else {
                            $titre = $_POST['titre'] . '%';
                        }
                        if(empty($_POST['realisateur']))
                        {
                            $realisateur = '%';
                        } else {
                            $realisateur = $_POST['realisateur'] . '%';
                        }
                        if(empty($_POST['annee']))
                        {
                            $annee = '%';
                        } else {
                            $annee = $_POST['annee'] . '%';
                        }
                        if(empty($_POST['acteur']))
                        {
                            $acteur = '%';
                        } else {
                            $acteur = $_POST['acteur'] . '%';
                        }
                        if(empty($_POST['support']))
                        {
                            $support = '%';
                        } else {
                            $support = $_POST['support'];
                        }
                        if(empty($_POST['qualite']))
                        {
                            $qualite = '%';
                        } else {
                            $qualite = $_POST['qualite'];
                        }
                        if(empty($_POST['langue']))
                        {
                            $langue = '%';
                        } else {
                            $langue = $_POST['langue'];
                        }
                        if(empty($_POST['genre']))
                        {
                            $genre = '%';
                        } else {
                            $genre = $_POST['genre'] . '%';
                        }
                //La requete SQL
                        $requete = $bdd->prepare('SELECT * FROM mes_films 
                            WHERE titre LIKE :titre 
                            AND realisateur LIKE :realisateur 
                            AND annee LIKE :annee 
                            AND acteur LIKE :acteur 
                            AND support LIKE :support 
                            AND qualite LIKE :qualite 
                            AND langue LIKE :langue 
                            AND genre LIKE :genre
                            ORDER BY titre');
                        $requete->execute(array(
                            ':titre'=>$titre,
                            ':realisateur'=>$realisateur,
                            ':annee'=>$annee,
                            ':acteur'=>$acteur,
                            ':support'=>$support,
                            ':qualite'=>$qualite,
                            ':langue'=>$langue,
                            ':genre'=>$genre
                        ));
                        if($requete->rowCount() != 0) //Si l'objet renvoyé par le requète n'est pas vide, alors on crée un tableau HTML avec les resultat.
                        {
                            echo '<p style="margin: 20px;">Il y a ' . $requete->rowCount() . ' résultats.</p>';
               tableau_resultat($requete);
                        $requete->closeCursor();
                        } else { //Si la requète est vide on affiche un message.
                            echo '<div class="aucun_resultat" style="margin: 50px; text-align: center;">
            <p style="font-size: 25px;">Aucun résultat.</p>
            <br /><br />
            <a href="recherche_mes_films.php"><button>Retour</button></a>
            </div>
            ';
                        }
                    } else { // ici on crée le formulaire si la $_POST n'existe pas
                        formulaire_recherche();
                    }
                ?>
            </div>
        </div>
    </body>
</html>
