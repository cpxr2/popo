<?php
session_start();
$titrePage="Créer un joueur";
if($_SESSION['acces'] == 2)
{

?>

<!--******************** HTML HEAD ****************************-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include '../include/header.php'; ?>
        <link rel="stylesheet" href="../css/backStyle.css">
    </head>
    <body>
        <div class="container" id="page">
            <!--***************** FIN HTML ******************************-->

            <?php
    if(!isset($_POST['creer']))
    {
            ?>
            <!--*********************** HTML FORMULAIRE ***********************-->
            <div class="row">
                <div class="col-lg-12">
                    <h1>Créer un nouveau joueur</h1>
                    <br /><br />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" id="pseudo" name="pseudo" /><span class="rouge" id="etoileP"></span>
                        </div>

                        <div class"form-group">
                            <label for="mdp">Mot de passe</label>
                            <input type="password" id="mdp" name="mdp" /><span class="rouge" id="etoileM"></span>
                        </div><br />

                        <div class"form-group">
                            <label for="conf">Confirmation</label>
                            <input type="password" id="conf" name="conf" /><span class="rouge" id="etoileC"></span>
                        </div>
                        <br />
                        <div id="erreur" class="rouge"></div>

                        <br />
                        <input type="submit" class="btn btn-primary" name="creer" value="créer" id="creer"/>
                    </form>
                    <br /><br />
                </div>
            </div>


            <!--***************** FIN HTML ******************************-->
            <?php
    }
    else
    {
        require 'connexion.php';

        $pseudo = $_POST['pseudo'];
        $mdp = hash('sha256', $_POST['mdp'], false);

        $requete = $bdd->prepare('INSERT INTO joueur(nom_jou, mdp_jou, jeton_jou, acces_jou, id_admin) VALUES (:pseudo, :mdp, 0, 1, :admin)');
        $requete->execute([':pseudo'=>$pseudo, ':mdp'=>$mdp, ':admin'=>$_SESSION['id_admin']]);

        //****************** HTML CONFIRMATION ********************
        if($requete){
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <span class="reponse">Nouveau joueur créée.<br />
                        Pensez à lui ajouter des jetons.</span><br /><br /><br />
                </div>
            </div>

            <!--***************** FIN HTML ******************************-->
            <?php
        }else{
            echo '<span class="reponse">ECHEC !!! Une erreur est survenue</span>';
        }
    }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <a href="backAdmin.php"><button class="btn btn-primary">Retour</button></a>
                    <a href="backAjoutJeton.php"><button class="btn btn-warning">Jetons</button></a>
                    <a href="backDeconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>
        </div>
        <script>
            $("#creer").click(function(e){

                if(($("#pseudo").val())=="") {
                    $("#erreur").html("Vous devais remplir les 2 champs");
                    $("#pseudo").css("border", "2px solid red");
                    $("#etoileP").html(" *");
                    e.preventDefault();
                }
                if(($("#mdp").val())=="") {
                    $("#erreur").html("Vous devais remplir les 2 champs");
                    $("#mdp").css("border", "2px solid red");
                    $("#etoileM").html(" *");
                    e.preventDefault();
                }
                if(($("#mdp").val())!= $("#conf").val()) {
                    $("#erreur").html("Les mots de passe ne sont pas identique.");
                    $("#mdp").css("border", "2px solid red");
                    $("#conf").css("border", "2px solid red");
                    $("#etoileM").html(" *");
                    $("#etoileC").html(" *");
                    e.preventDefault();
                }
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
