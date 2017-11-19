<?php
session_start();
$titrePage="Menu Back Office";
require 'connexion.php';
if(isset($_SESSION['acces']) && ($_SESSION['acces'] == 2)){

    function motDePasse($erreur=false){
?>
<h1>Vérification du mot de passe</h1>
<form action="<?php  $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="form-group">
        <label for="pwd">Mot de passe :</label>
        <input type="password" class="form-control" id="mdp" name="mdp">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
<?php
        if($erreur){
            echo '<span id="erreur">Mot de passe incorrecte.</span>';
        }
                                      }
    $id = $_SESSION['id_admin'];
    // Partie Temporaire
    /* if($_SESSION['partieTemp']){
        $date = $_SESSION['date'];

        $infojeton = $bdd->prepare('SELECT jeton_jt FROM joueur_temporaire WHERE id_admin= :id AND date_jt = :date');
        $infojeton->bindParam(':date', $date);
        $infojeton->bindParam(':id', $id);
        $infojeton->execute();
        $resJetonTemp = $infojeton->fetch();
        $jetonInit = $resJetonTemp[0];
        $infojeton->closeCursor();

        //Partie logger
    }else{
        $id = $_SESSION['id'];

        $infojeton = $bdd->prepare('SELECT jeton_jt FROM joueur WHERE id_jou= :id');
        $infojeton->bindParam(':id', $id);
        $infojeton->execute();
        $resJetonTemp = $infojeton->fetch();
        $jetonInit = $resJetonTemp[0];
        $infojeton->closeCursor();
    }*/

    $req = $bdd->prepare('SELECT * FROM admin WHERE id_admin = :id');
    $req->bindParam(':id', $id);
    $req->execute();
    $resultat = $req->fetch();
    $trueMdp = $resultat['mdp_admin'];
    //var_dump($resultat);
    $req->closeCursor();


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
    // Si le mot de passe a été saisie
    if(isset($_POST['mdp'])){

        $mdp = hash('sha256', $_POST['mdp'], false);

        // Si le mot de passe saisie est correct
        if($mdp == $trueMdp){
            ?>
            <div class="row">
                <h1 class="col-sm-12">Gains</h1>
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
                        <!--Affichage du montant de jeton-->
                        <div class="col-sm-12" id="ajoutJeton">
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                <input type="text" name="jeton" id="total" value="0" readonly />
                                </div>
                            </form>
                        <div class="col-sm-12" id="blocBtn">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alerteModal" id="btnAjout">Payer</button>
                            <button class="btn btn-danger" id="btnClear">Remise à 0</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="alerteModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title attention" id="alertModalLabel">ATTENTION !!!!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ATTENTION !!!!<br />
                            Il ne sera plus possible d'annuler le payement après avoir cliqué sur "payer".
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="payer" class="btn btn-primary">Payer</button>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <a href="backAdmin.php"><button class="btn btn-primary">Retour</button></a>


            <?php
        }else{
            motDePasse(true);
        }
    }else if(!isset($_POST['payer'])){
        motDePasse();

    }
    if(isset($_POST['payer'])){

        $jeton = $_POST['jeton'];

        $dateFR = $_SESSION['date'];


        // mise à jour des jetons donnés par le bar
        $majEntreeBar = $bdd->prepare('UPDATE admin SET jeton_sortie_admin =jeton_sortie_admin + :jeton WHERE id_admin = :id');
        $majEntreeBar->bindParam(':jeton', $jeton);
        $majEntreeBar->bindParam(':id', $id);
        $majEntreeBar->execute();
        $majEntreeBar->closeCursor();

        // mise à jour des jetons du joueur temporaire
        if($_SESSION['partieTemp']){
            $id = $_SESSION['id_admin'];

            $requete = $bdd->prepare('UPDATE joueur_temporaire SET jeton_jt = jeton_jt - :jeton, payer_jt = payer_jt + :jeton WHERE id_admin= :id AND date_jt = :date');
            $requete->bindParam(':jeton', $newSolde);
            $requete->bindParam(':id', $id);
            $requete->bindParam(':date', $dateFR);
            $requete->execute();
            $requete->closeCursor();
        }else{
            $id = $_SESSION['id'];

            $requete = $bdd->prepare('UPDATE joueur SET jeton_jou = jeton_jou - :jeton WHERE id_jou = :id)');
            $requete->bindParam(':jeton', $jeton);
            $requete->bindParam(':id', $id);
            $requete->execute();
            $requete->closeCursor();
        }
            ?>
            <p>Vous avez payé <?=$jeton?> jetons.</p>
            <br /><br />
            <div class="row">
                <div class="col-lg-12">

                    <a href="../jeu.php"><button class="btn btn-primary">Jouer</button></a>
                    <a href="backAdmin.php"><button class="btn btn-primary">Accueil</button></a>
                    <a href="backDeconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>
            <?php
    }
            ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

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

            // *** MODAL ***
            $('#alerteModal').modal({
                backdrop: false,
                keyboard: false
            })
        </script>
    </body>
</html>

<?php
}else{
    echo 'accés refusé';
}
?>
