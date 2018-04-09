<?php
session_start();
$titrePage="Partie Rapide - Ajout de jetons";
if(($_SESSION['acces'] == 2) || ($_SESSION['acces'] == 3))
{
    require 'connexion.php';
    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <?php include '../include/header.php'; ?>
        <link rel="stylesheet" href="../css/backStyle.css">
    </head>
    <body>
        <?php
        if($_SESSION['acces'] == 3){
            include 'backSANavBar.php';
        }
        ?>
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
                        <button class="btn btn-secondary boutonAdd" value="0.5" id="btn5">5</button><br />
                        <button class="btn btn-secondary boutonAdd" value="1" id="btn10">10</button><br />
                        <button class="btn btn-secondary boutonAdd" value="2" id="btn20">20</button><br />
                        <button class="btn btn-secondary boutonAdd" value="5" id="btn50">50</button><br />

                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <!--Affichage du montant de jeton-->
                            <div class="col-sm-12" id="ajoutJeton">
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
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
                $id = $_SESSION['id_admin'];
                date_default_timezone_set('Europe/Paris');
                setlocale(LC_TIME, 'fr_FR.utf8','fra');
                $dateFR = strftime("%A %d %B %Y - %H:%M:%S");

                // mise à jour des jetons donnés par le bar
                $majEntreeBar = $bdd->prepare('UPDATE admin SET jeton_entree_admin = jeton_entree_admin+:jeton WHERE id_admin = :id');
                $majEntreeBar->bindParam(':jeton', $jeton);
                $majEntreeBar->bindParam(':id', $id);
                $majEntreeBar->execute();
                $majEntreeBar->closeCursor();

                // mise à jour des jetons du joueur temporaire

                $requete = $bdd->prepare('INSERT INTO joueur_temporaire(jeton_jt, id_admin, date_jt) VALUES (:jeton, :id_admin, :date)');
                $requete->bindParam(':jeton', $jeton);
                $requete->bindParam(':id_admin', $id);
                $requete->bindParam(':date', $dateFR);
                $requete->execute();
                $requete->closeCursor();

                $_SESSION['nbJeton'] = intval($jeton, 10);
                $_SESSION['partieTemp'] = true;
                $_SESSION['date'] = $dateFR;
                ?>
                <p>Vous avez ajouté <?=$jeton?> jetons.</p>
                <br /><br />
                <div class="row">
                    <div class="col-lg-12">

                        <a href="../jeu.php"><button class="btn btn-primary">Jouer</button></a>

                    </div>
                </div>
                <?php
            }
            ?>

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
        $.post(
            '../recupParamAjax.php',
            function(data){
                data = JSON.parse(data);
                var montant = parseInt(data['valeur_10']);
                $(".boutonAdd").each(function(){
                    $(this).click(function(){
                        var ajout = parseFloat($(this).attr("value"), 10)*montant;
console.log(parseInt($(this).attr("value")));
                        var total = parseInt($("#total").val(), 10);
                        $("#total").val(ajout + total);
                    });
                });
                $("#btnClear").click(function(){
                    $("#total").val("0");
                });
            }
        )
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
