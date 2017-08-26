<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier un film</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div id="page">
            <header>
                <h1>Modifier un film</h1>
            </header>
            <nav>
                <?php include 'navigation.php'; ?>
            </nav>
            <div id="corp_page">
                <?php

                require 'fonction.php';
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
                <Section class="formulaire">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                        <input type="hidden" name='id' value="<?=$id ?>" />
                        <label>Titre : </label><input type="text" name="titre" value="<?=$titre?>" /><br />
                        <label>Réalisateur : </label><input type="text" name="realisateur" value="<?=$real?>" /><br />
                        <label>Année : </label><input type="text" name="annee" value="<?=$annee?>" /><br />
                        <label>Acteurs : </label><input type="text" name="acteur" value="<?=$acteur?>" /><br />
                        <label>Type de support : </label><select name="support">
                        <option value="<?=$support?>" selected><?=$support?></option>
                        <option value="dvd">DVD</option>
                        <option value="mkv">MKV</option>
                        <option value="avi">AVI</option>
                        <option value="autre">Autre</option>
                        </select><br />
                        <label>Qualité : </label><select name="qualite">
                        <option value="<?=$qualite?>" selected><?=$qualite?></option>
                        <option value="720">720i</option>
                        <option value="1080">1080p</option>
                        <option value="dvd">DVD</option>
                        <option value="divx">Divx</option>
                        <option value="autre">Autre</option>
                        </select><br />
                        <label>Langue : </label><select name="langue">
                        <option value="<?=$langue?>" selected><?=$langue?></option>
                        <option value="vf">VF</option>    
                        <option value="vq">VQ</option>
                        <option value="multi">MULTI</option>
                        <option value="vo">VO</option>
                        <option value="vostf">VOSTF</option>
                        <option value="autre">Autre</option>
                        </select><br />
                        <label>Genre : </label><input type="text" name="genre" value="<?=$genre?>" /><br />
                        <label>Lien imdb :</label><input type="text" name="imdb" value="<?=$imdb?>" /><br /><br />
                        <input type="submit" value="Modifier" name="envoyer" />

                    </form>
                </Section>
                <?php

                }else if(isset($_POST['envoyer'])) 
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



                        $req = $bdd->prepare('UPDATE mes_films 
            SET titre=:titre,
            realisateur=:realisateur,
            annee=:annee,
            acteur=:acteur,
            support=:support,
            qualite=:qualite,
            langue=:langue,
            genre=:genre,
            imdb=:imdb 
            WHERE ID=:id');
                        $req->execute(array(
                            ':titre'=>$titre,
                            ':realisateur'=>$realisateur,
                            ':annee'=>$annee,
                            ':acteur'=>$acteur,
                            ':support'=>$support,
                            ':qualite'=>$qualite,
                            ':langue'=>$langue,
                            ':genre'=>$genre,
                            ':imdb' => $_POST['imdb'],
                            ':id'=>$_POST['id']
                        ));

                        $req->closeCursor(); 
                ?>
                <div class="ajout">
                    <p>Le film a bien été modifier.</p>
                    <a href="Tous_les_Films.php"><button>Retour</button></a>
                </div>
                <?php          
                    }else {
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
