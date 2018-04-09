<?php
session_start();
if($_SESSION['acces'] == 1)
{
    require 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex">
        <title>Ajout de jeton</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="css/backStyle.css">
    </head>
    <body>
        <div class="container">
            <?php
    if(!isset($_POST['ajouter']))
    {
            ?>
            <h1>Ajout de jetons</h1>
            <br /><br />
            <div class row>
                <form method="post" action="<?php $_SERVER['PHP_SELF']?>" >
                    <div class="form-group">
                        <label for="jeton">Indiquer le nombre de jetons</label><br />
                        <input type="number" name="jeton" step="10" value="0" min="0" id="jeton"/><span class="rouge"> *</span>
                    </div>
                    <div class="erreur"></div><br/>            
                    <input class="btn btn-primary" type="submit" value="Crediter" id="credit" name="ajouter" /> 
                </form>
            </div>
            <br />
            <a href="jeu.php"><button class="btn btn-primary">Retour</button></a>
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
        $id = $_SESSION['id'];

        $requete = $bdd->prepare('UPDATE users SET jeton_usesr = jeton_user + :jeton WHERE id_user = :id');
        $requete->execute([':jeton'=>$jeton, ':id'=>$id]);
        $requete->closeCursor();
            ?>
            <p>Vous avez ajouté <?=$jeton?> jetons.</p>
            <br /><br />
            <div class="row">
                <div class="col-lg-12">                
                    <a href="jeu.php"><button class="btn btn-warning">Retour au jeu</button></a>
                    <a href="backDeconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>
            <?php  
    }
            ?>

        </div>
    </body>
</html>


<?php
}
else
{
    echo 'acces non autorisé.';
}
?>