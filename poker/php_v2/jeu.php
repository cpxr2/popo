<?php
session_start();
if(isset($_SESSION['acces'])){
    $a = $_SESSION['acces'];

    if((isset($_SESSION['nbJeton'])) && ($_SESSION['nbJeton'] > 0))
    {
        if($a == 1){
            $nom = $_SESSION['pseudo'];
        }else{
            $nom = "";
        }
        if($_SESSION['reload']){
            ?>
            <script>window.location.reload(true)</script>
            <?php
            $_SESSION['reload'] = false;
        }
        ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Video Poker</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
            <?php
            if($a = 3){
                ?>
                <link rel="stylesheet" href="css/SAStyle.css">
                <?php
            }
            ?>
            <link rel="stylesheet" href="css/jeu.css">
        </head>

        <body>
            <div class="container" id="page">
                <?php
                if($a = 3){
                    include 'backOffice/backSANavBar.php';
                }
                ?>
                <div class="row" id="menu">
                    <div class="col-6" >
                        <button class="btn btn-info">Accueil</button>
                        <a href="backPayer.php"><button class="btn btn-danger">Payer</button></a>
                        <a href="backDeconnexion.php"><button class="btn btn-danger">Deconnection</button></a>
                    </div>

                    <div class="col-2" >
                        Bienvenue <?= $nom ?>.
                    </div>
                    <!--affichage du solde de jeton-->
                    <div class="offset-2 col-2" id="jeton">
                        Jetons :  <span id="nbjeton"></span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12" id="tapis">

                        <!-- ligne de la marge au dessus des cartes-->
                        <div class="row">
                            <div class="col-12" id="haut_tapis"></div>
                        </div>

                        <!--row des cartes -->
                        <div class="row">

                            <!--carte 1-->

                            <div class="offset-1 col-2 carte">
                                <img src="images/(53).png" alt="carte1" id="c0" />
                            </div>

                            <!-- carte 2-->

                            <div class="col-2 carte">
                                <img src="images/(53).png" alt="carte2" id="c1" />
                            </div>

                            <!-- carte 3-->

                            <div class="col-2 carte">
                                <img src="images/(53).png" alt="carte3" id="c2" />
                            </div>

                            <!-- carte 4-->

                            <div class="col-2 carte">
                                <img src="images/(53).png" alt="carte4" id="c3" />
                            </div>

                            <!-- carte 5-->

                            <div class="col-2 carte">
                                <img src="images/(53).png" alt="carte5" id="c4" />
                            </div>


                        </div>

                        <!--row des boutons-->
                        <div class="row">


                            <div class="offset-1 col-2 bouton" style="display: none;" id="bouton1">
                                <input type="button" value="garder" id="bou1" class="btn btn-primary" />
                            </div>


                            <div class="col-2 bouton" style="display: none;" id="bouton2">
                                <input type="button" value="garder" id="bou2" class="btn btn-primary" />
                            </div>


                            <div class="col-2 bouton" style="display: none;" id="bouton3">
                                <input type="button" value="garder" id="bou3" class="btn btn-primary" />
                            </div>


                            <div class="col-2 bouton" style="display: none;" id="bouton4">
                                <input type="button" value="garder" id="bou4" class="btn btn-primary" />
                            </div>


                            <div class="col-2 bouton" style="display: none;" id="bouton5">
                                <input type="button" value="garder" id="bou5" class="btn btn-primary" />
                            </div>
                        </div>

                        <!--les boutons qui distriue les cartes-->
                        <div class="row">

                            <div class="offset-5 col-2 " id="dist1">

                                <button class="btn btn-primary btn-circle btn-xl" id="donne1">Distribuer</button>

                                <button class="btn btn-danger btn-circle btn-xl" style="display: none;" id="donne2" >Changer</button>

                                <button class="btn btn-success btn-circle btn-xl" style="display: none;" id="retour" >Nouvelle<br /> partie</button>
                            </div>

                            <div class="offset-2 col-3" id="pari">
                                <div class="row">
                                    <div class=" col-6" id="montant"></div>

                                    <div class="col-4" id="plusMoins">
                                        <button class="btn btn-primary btn-circle" id="plus" >+</button>
                                        <button class="btn btn-primary btn-circle" id="moins" >-</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--banniere qui affiche le resutat avec un fond transparent-->
                        <div class="row">
                            <div class="col-lg-12" id="resultat">

                                <!-- affiche "brelan, full, 2paires.....-->
                                <div class="row">
                                    <div class="col-lg-12" id="mainGagnante"></div>
                                </div>

                                <!--affiche le nombre de jeton gagnés-->
                                <div class="row">
                                    <div class="col-lg-12" id="gain"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
            <script src="js/recupJetonAjax.js"></script>
            <script src="js/fonction_poker.js"></script>
            <script src="js/1erTirageAjax.js"></script>
            <script src="js/2emeTirageAjax.js"></script>
        </body>
        </html>
        <?php
    }else{
        header('location: backOffice/backAjoutJetonTemp.php');
    }
}
else
{
    echo 'acces refusé';
}
?>
