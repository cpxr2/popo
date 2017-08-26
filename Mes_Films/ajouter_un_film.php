<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" :>
        <title>Ajouter un Films</title>
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
        <div id="page">
            <header>
                <h1>Ajouter un film</h1>
            </header>
            <div id="corp_page">
                <nav>
                    <?php include 'navigation.php' ?>
                </nav>
            

                
        <?php
    require 'fonction.php';
    require 'connexion.php';
                    
    if(isset($_POST['envoyer'])) 
    {
        if(empty($_POST['titre'])){
            $titre = null;
        }else {
            $titre=ucwords($_POST['titre']);
        }
        if(empty($_POST['realisateur'])){
            $realisateur = null;
        }else{
            $realisateur=ucwords($_POST['realisateur']);            
        }
        if(empty($_POST['annee'])){
            $annee = null;
        }else{
            $annee=$_POST['annee'];            
        }
        if(empty($_POST['acteur'])){
            $acteur = null;
        }else{
            $acteur=ucwords($_POST['acteur']);            
        }
        if(empty($_POST['support'])){
            $support = null;
        }else{
            $support=strtoupper($_POST['support']);          
        }
        if(empty($_POST['qualite'])){
            $qualite = null;
        }else{
            $qualite=strtoupper($_POST['qualite']);            
        }
        if(empty($_POST['langue'])){
            $langue = null;
        }else{
            $langue=strtoupper($_POST['langue']);            
        }
        if(empty($_POST['genre'])){
            $genre = null;
        }else{
            $genre=ucwords($_POST['genre']);            
        }
        
            

            $req = $bdd->prepare('INSERT INTO mes_films(titre, realisateur, annee, acteur, support, qualite, langue, genre, imdb)
VALUES(:titre, :realisateur, :annee, :acteur, :support, :qualite, :langue, :genre, :imdb)');
            $req->execute(array(
                ':titre'=>$titre,
                ':realisateur'=>$realisateur,
                ':annee'=>$annee,
                ':acteur'=>$acteur,
                ':support'=>$support,
                ':qualite'=>$qualite,
                ':langue'=>$langue,
                ':genre'=>$genre,
                ':imdb' => $_POST['imdb']
            ));

            $req->closeCursor(); 
?>
                <div class="ajouter">
                <p>Le film a bien été ajouté.</p>
                <a href="ajouter_un_film.php"><button>Ajouter un autre film</button></a>
                </div>
<?php          
            
    } else {
        
        formulaire_ajout();
    }
        ?>
            </div>
        </div>
    </body>

</html>
