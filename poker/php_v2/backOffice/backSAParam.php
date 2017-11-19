<?php
session_start();
$titrePage="Admin Back office - Paramètres";
if($_SESSION['acces'] == 3)
{
    require 'connexion.php';
    // ******** MISE A JOUR DES NOUVEAUX REGLAGES ******
    if(isset($_POST['valid'])){
        $req = $bdd->prepare('UPDATE setting SET mise=:mise, mise_max=:m_max, valeur_10=:val10 WHERE id=1');
        $req->bindValue(':mise', $_POST['mise']);
        $req->bindValue(':m_max', $_POST['mise_max']);
        $req->bindValue(':val10', $_POST['montant']);
        $res = $req->execute(); // j'execute la requete dans un variable pour recuperer "true" ou "false" si la requete a réussi ou raté.

        //*************** AFFICHAGE DES MESSAGES DE REUSSITE OU D'ERREUR *******************
        if($res){
            ?>
            <div class="container">
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check fa-2x" aria-hidden="true"></i>Les nouveaux réglages ont bien été pris en compte.
                </div>
            </div>

            <?php
        }else{
            ?>
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>Une érreur c'est produite.
                </div>
            </div>
            <?php
        }

    }

    //****************** RECUPERATION DES VALEUR DANS LA BDD *************
    $maj = $bdd->query('SELECT * FROM setting WHERE id=1');
    $valeur = $maj->fetch(PDO::FETCH_OBJ);
    $mont = intval($valeur->valeur_10, 10);
    $mise = intval($valeur->mise, 10);
    $mise_max = intval($valeur->mise_max, 10);
    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <?php include '../include/header.php'; ?>
        <link rel="stylesheet" href="../css/SAStyle.css">
    </head>

    <body>
        <div class="container">
            <?php include 'backSANavBar.php'; ?>
            <h1>Paramètrage</h1>


            <form id="formParam" action="<?php $_SERVER['PHP_SELF']?>" method="post" class="mt-5">
                <fieldset>
                    <legend class="mb-3 mt-3">Réglages des mises :</legend>
                    <div class="form-group row">
                        <label for="mise" class="col-sm-2 col-form-label">Mise</label>
                        <div class="col-sm-10">
                            <input type="number" name="mise" class="form-control parametre" value="<?=$mise?>" id="mise" min="0" ><i class="fa fa-question-circle fa-2x fa-align-right" data-toggle="tooltip" data-placement="right" title="Valeur ajoutée a chaque clic sur le bouton + " aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="miseMax" class="col-sm-2 col-form-label">Mise max</label>
                        <div class="col-sm-10">
                            <input type="number" name="mise_max" class="form-control parametre" id="miseMax" min="0" value="<?=$mise_max?>"><i class="fa fa-question-circle fa-2x fa-align-right" data-toggle="tooltip" data-placement="right" title="Mise maximale que l'on peut parier" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="montant_10" class="col-sm-2 col-form-label">Montant</label>
                        <div class="col-sm-10">
                            <input type="number" name="montant" class="form-control parametre" id="montant" min="0" value="<?=$mont?>"><i class="fa fa-question-circle fa-2x fa-align-right" data-toggle="tooltip" data-placement="right" title="Nombre de jetons pour 10 €" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-dark" name="valid" value="Valider" />
                </fieldset>
            </form>



        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
        <script src="../js/alertFonction.js"></script>
        <script>
        $("#formParam").validate({
            rules: {
                mise: "required",
                miseMax: "required",
                montant: "required"

            },
            // Messages a afficher en cas d'erreur
            messages: {
                mise: "* Ne peut pas être nul.",
                miseMax: "* Ne peut pas être nul.",
                montant: "* Ne peut pas être nul."
            }
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
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
