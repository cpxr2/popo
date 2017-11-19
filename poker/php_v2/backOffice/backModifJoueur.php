<?php
session_start();
$titrePage="Modifier un joueur";
if($_SESSION['acces'] == 2)
{
    require 'connexion.php';
    $requete = $bdd->query('SELECT id_jou, nom_jou FROM joueur');
?>

<!--******************** HTML HEAD ****************************-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include '../include/header.php'; ?>
        <link rel="stylesheet" href="../css/backStyle.css">
    </head>

    <body>
        <div class="container">
            <?php
//**************************** FORMULAIRE DE MODIF (ETAPE 2)*****************
    if(isset($_POST['choisir'])){

        $requete = $bdd->prepare('SELECT * FROM joueur WHERE id_jou = :id;');
        $requete->execute([':id'=>$_POST['id_jou']]);
        $res = $requete->fetch();
            ?>
            <div class="row">
                <div class="col-lg-12"><h1>Modifier de <span class="nom"><?=$res['nom_jou']?></span></h1></div><br /><br />
            </div>
            <div class="row">
                <form method="post" action="<?php $_SERVER['PHP_SELF']?>" >
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?=$res['id_jou']?>"/>
                        <input type="hidden" name="pseudo" value="<?=$res['nom_jou']?>"/>
                        <label for="jeton">Nombre de jetons : </label>
                        <input id="jeton" type="number" name="jeton" step="10" min="0" value="<?=$res['jeton_jou']?>" /><br /><br />
                        <label for="mdp">Nouveau mot de passe : </label>
                        <input id="mdp" type="text" name="mdp"/><br /><br />

                        <input class="btn btn-primary" type="submit" value="Modifier" name="modifier" />

                    </div>
                </form>
            </div>


            <?php
//******************* CONFIRMATION DE LA MODIF (ETATPE 3)**************************

    }else if(isset($_POST['modifier'])){

        $mdpHash = hash('sha256', $_POST['mdp'], false);
        $jeton = $_POST['jeton'];
        $mdp = $_POST['mdp'];


        if(($jeton != "") && ($mdp != "")){


            $requete = $bdd->prepare("UPDATE joueur SET mdp_jou=:mdp,jeton_jou=:jeton WHERE id_jou = :id;");
            $requete->execute([':id'=>$_POST['id'],':mdp'=>$mdpHash,':jeton'=>$jeton]);

            echo '<span class="reponse">Le mot de passe de '. $_POST['pseudo'] . ' a été changer et il est crédité de ' . $jeton.' </span><br /><br />';

        }else if(isset($jeton)){

            $requete = $bdd->prepare("UPDATE joueur SET jeton_jou=:jeton WHERE id_jou =  :id;");
            $requete->execute([':id'=>$_POST['id'],':jeton'=>$jeton]);

            echo '<span class="reponse">' . $_POST['pseudo'] . ' a un nouveau solde de ' . $jeton . ' jetons</span><br /><br />';

        }else if(isset($mdp)){

            $requete = $bdd->prepare("UPDATE joueur SET mdp_jou=:mdp WHERE  id_jou = :id;");
            $requete->execute([':id'=>$_POST['id'],':mdp'=>$mdpHash]);

            echo '<span class="reponse">Le mot de passe de '. $_POST['pseudo'] . ' a été changer.</span><br /><br />';

        }else{

            echo '<span class="reponse">Auncune modification n\'a été apporté à ' .$_POST['pseudo'] . '</span><br /><br />';
        }
//**************** CHOIX DU JOUEUR A MODIFIER (ETAPE 1)***********************
    }else{

        $requete = $bdd->query('SELECT id_jou, nom_jou FROM joueur');
            ?>
            <div class="row">
                <div class="col-lg-12"><h1>Choisissez un joueur</h1></div>
            </div>
            <div class="row">
                <form method="post" action="<?php $_SERVER['PHP_SELF']?>" >
                    <div class="form-group">
                        <label for="joueur">Choisir un joueur : </label>
                        <select name="id_jou" id="joueur">
                            <?php
                while($pseudo = $requete->fetch())
                {
                            ?>
                            <option value="<?=$pseudo['id_jou']?>"><?=$pseudo['nom_jou']?></option>
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
//**************** BAS DE LA PAGE *******************************
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <a href="backAdmin.php"><button class="btn btn-primary">Retour</button></a>
                    <a href="backAjoutJeton.php"><button class="btn btn-warning">Jetons</button></a>
                    <a href="backDeconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
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
