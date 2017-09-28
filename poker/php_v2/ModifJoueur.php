<?php
session_start();
if($_SESSION['acces'] == 3)
{
    require 'connexion.php';
    $requete = $bdd->query('SELECT id_util, pseudo_util FROM utilisateur');
?>

<!--******************** HTML HEAD ****************************-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier un joueur</title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="css/creerUtilisateur.css">
    </head>

    <body>    
        <div class="container">      
            <?php

    if(isset($_POST['choisir'])){

        $requete = $bdd->prepare('SELECT * FROM utilisateur WHERE id_util = :id;');
        $requete->execute([':id'=>$_POST['id_util']]);
        $res = $requete->fetch();
            ?>
            <div class="row">
                <div class="col-lg-12"><h1>Modifier de <span class="nom"><?=$res['pseudo_util']?></span></h1></div><br /><br />
            </div>
            <div class="row">
                <form method="post" action="<?php $_SERVER['PHP_SELF']?>" >
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?=$res['id_util']?>"/>
                        <input type="hidden" name="pseudo" value="<?=$res['pseudo_util']?>"/>
                        <label for="jeton">Nombre de jetons : </label>
                        <input id="jeton" type="number" name="jeton" step="10" min="0" value="<?=$res['jeton_util']?>" /><br /><br />
                        <label for="mdp">Nouveau mot de passe : </label>
                        <input id="mdp" type="text" name="mdp"/><br /><br />

                        <input class="btn btn-primary" type="submit" value="Modifier" name="modifier" />

                    </div>
                </form>
            </div>


            <?php
    }else if(isset($_POST['modifier'])){

        $mdpHash = hash('sha256', $_POST['mdp'], false);
        $jeton = $_POST['jeton'];
        $mdp = $_POST['mdp'];


        if($jeton != "") && ($mdp != ""){


            $requete = $bdd->prepare("UPDATE utilisateur SET mdp_util=:mdp,jeton_util=:jeton WHERE :id;");
            $requete->execute([':id'=>$_POST['id'],':mdp'=>$mdpHash,':jeton'=>$jeton]);

            echo '<span class="reponse">Le mot de passe de '. $_POST['pseudo'] . 'a été changer et il est crédité de ' . $jeton.' </span><br /><br />';

        }else if(isset($jeton)){

            $requete = $bdd->prepare("UPDATE utilisateur SET jeton_util=:jeton WHERE :id;");
            $requete->execute([':id'=>$_POST['id'],':jeton'=>$jeton]);

            echo '<span class="reponse">' . $_POST['pseudo'] . ' est crédité de ' . $jeton . '</span><br /><br />';

        }else if(isset($mdp)){

            $requete = $bdd->prepare("UPDATE utilisateur SET mdp_util=:mdp WHERE :id;");
            $requete->execute([':id'=>$_POST['id'],':mdp'=>$mdpHash]);

            echo '<span class="reponse">Le mot de passe de '. $_POST['pseudo'] . ' a été changer.</span><br /><br />';

        }else{

            echo '<span class="reponse">Auncune modification n\'a été apporté à ' .$_POST['pseudo'] . '</span><br /><br />';
        }

    }else{

        $requete = $bdd->query('SELECT id_util, pseudo_util FROM utilisateur');
            ?>
            <div class="row">
                <div class="col-lg-12"><h1>Choisissez un joueur</h1></div>
            </div>
            <div class="row">
                <form method="post" action="<?php $_SERVER['PHP_SELF']?>" >
                    <div class="form-group">
                        <label for="joueur">Choisir un joueur : </label>
                        <select name="id_util" id="joueur">
                            <?php
                while($pseudo = $requete->fetch())
                {
                            ?>
                            <option value="<?=$pseudo['id_util']?>"><?=$pseudo['pseudo_util']?></option>
                            <?php
                }
                            ?>
                        </select>
                        <input class="btn btn-primary" type="submit" value="choisir" name="choisir" />
                        </form>
                    </div>
            </div>
            <?php
    }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <a href="back.php"><button class="btn btn-primary">Retour</button></a>
                    <a href="ajoutJeton.php"><button class="btn btn-warning">Jetons</button></a>
                    <a href="deconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>       
        </div>
    </body>
</html>
<?php

}else{

    echo 'acces non autorisé.';
}
?>