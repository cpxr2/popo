<?php
session_start();
$titrePage="Ajout de jetons";
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
        <?php include '../include/header.php'; ?>
        <link rel="stylesheet" href="../css/backStyle.css">
    </head>
    <body>
        <div class="container">
            <?php
    if(!isset($_POST['ajouter']))
    {
            ?>

            <div class="row">
                <h1 class="col-sm-12">Ajout de jetons</h1>
            </div>
            <br /><br />
            <div class="row">
                <div class="col-sm-6 listeBtn">
                    <button class="btn btn-secondary boutonAdd" id="btn5">5</button><br />
                    <button class="btn btn-secondary boutonAdd" id="btn10">10</button><br />
                    <button class="btn btn-secondary boutonAdd" id="btn20">20</button><br />
                    <button class="btn btn-secondary boutonAdd" id="btn50">50</button><br />

                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
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
                            <!--Affichage du montant de jeton-->
                            <div class="col-sm-12" id="ajoutJeton">
                                <input type="text" name="jeton" id="total" value="0" readonly />
                            </div>
                            <div class="col-sm-12" id="blocBtn">
                                <button type="submit" name="ajouter" class="btn btn-primary" id="btnAjout">Ajouter</button>
                                </form>
                            <button class="btn btn-danger" id="btnClear">Remise à 0</button>
                            </div>
                    </div>
                </div>
            </div>

            <br />
            <a href="backAdmin.php"><button class="btn btn-primary">Retour</button></a>

            <?php
    }
    else
    {

        $jeton = $_POST['jeton'];
        $id = $_POST['id_jou'];

        $requete = $bdd->prepare('UPDATE joueur SET jeton_jou = jeton_jou + :jeton WHERE id_jou = :id');
        $requete->bindParam(':jeton', $jeton);
        $requete->bindParam(':id', $id);
        $requete->execute();
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

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            $(".boutonAdd").each(function(){
                $(this).click(function(){
                    var ajout = parseInt($(this).text(), 10);
                    var total = parseInt($("#total").val(), 10);
                    $("#total").val(ajout + total);
                });
            });
            $("#btnClear").click(function(){
                $("#total").val("0");
            });
        </script>
    </body>
</html>


<?php
}
else
{
    echo 'acces non autorisé.';
}
?>
