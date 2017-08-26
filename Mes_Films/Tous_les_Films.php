<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Tous les Films</title>
        <link href="style.css" rel="stylesheet"/>
        <style>
            td{text-align: center;}
        </style>
    </head>

    <body>
        <div id="page">
            <header>
                <h1>Liste de tous les films</h1>
            </header>
            <div id="corp_page">
                <nav>
                    <?php include 'navigation.php' ?>
                </nav>

                <Section>
                    <?php
                    require 'fonction.php';
                    require 'connexion.php';
                    
                    $requete = $bdd->query('SELECT * FROM mes_films ORDER BY titre');
                    
                    tableau_resultat($requete);
                    $requete->closeCursor();
                    ?>




                </Section>
            </div>
        </div>
    </body>

</html>
