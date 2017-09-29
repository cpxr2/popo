<?php
session_start();
if($_SESSION['acces'] == 2)
{
    require 'connexion.php';

    $requete = $bdd->query('SELECT id_jou, nom_jou FROM joueur');
    //$resultat = $requete->fetch();
    //print_r($resultat);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout de jeton</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="css/backStyle.css">
    </head>
    <?php
    if(!isset($_POST['ajouter']))
    {
    ?>
    <body>

        <h1>Ajout de jetons</h1>
        <br /><br />
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
            </div>
            <div class="form-group">
                <label for="jeton">Indiquer le nombre de jetons</label><br />
                <input type="number" name="jeton" step="10" value="0" min="0" id="jeton"/><span class="rouge"> *</span>
            </div>
            <div class="erreur"></div><br/>
            <input type="hidden" name="id" value="<?=$pseudo['id_jou']?>" />
            <input class="btn btn-primary" type="submit" value="Crediter" id="credit" name="ajouter" /> 
        </form>
        <br />
        <a href="backAdmin.php"><button class="btn btn-primary">Retour</button></a>
        <script>
            $("#credit").click(function(e){
                
                if(($("#jeton").val())=="" || ($("#jeton").val()=="0")) {
                    $(".erreur").html("<span class=\"rouge\">Vous devais choisir un nombre de jetons à ajouter</span>");
                e.preventDefault();
                }
            });       
        </script>

        <?php
    }
    else
    {

        $jeton = $_POST['jeton'];
        $id = $_POST['id_jou'];

        $requete = $bdd->prepare('UPDATE joueur SET jeton_jou = jeton_jou + :jeton WHERE id_jou = :id');
        $requete->execute([':jeton'=>$jeton, ':id'=>$id]);
        ?>
        <p>Vous avez ajouté <?=$jeton?> jetons.</p>
        <br /><br />
        <div class="row">
            <div class="col-lg-12">
                <a href="backAdmin.php"><button class="btn btn-primary">Retour</button></a>
                <a href="backAjoutJeton.php"><button class="btn btn-warning">Jetons</button></a>
                <a href="backDeconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
            </div>
        </div>
        <?php  
    }
        ?>
        

    </body>
</html>


<?php
}
else
{
    echo 'acces non autorisé.';
}
?>