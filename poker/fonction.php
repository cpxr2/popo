<?php
function tapis($main) {
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Video Poker</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12" id="menu">
                    <button class="btn btn-info">Accueil</button>
                    <button class="btn btn-info">Compte</button>
                    <button class="btn btn-info">retour</button>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12" id="tapis">                    

                    <!-- ligne de la marge au dessus des cartes-->
                    <div class="row">                
                        <div class="col-xs-12" id="haut_tapis"></div>                     
                    </div>

                    <!--row des cartes -->
                    <div class="row">                      

                        <!--carte 1-->

                        <div class="col-xs-offset-1 col-xs-2 carte" id="c1">
                            <img src="<?php echo $main[0] ?>" alt="carte1" />
                        </div>                           

                        <!-- carte 2-->

                        <div class="col-xs-2 carte" id="c2">
                            <img src="<?php echo $main[1] ?>" alt="carte2" />
                        </div>                           

                        <!-- carte 3-->

                        <div class="col-xs-2 carte" id="c3">
                            <img src="<?php echo $main[2] ?>" alt="carte3" />
                        </div>

                        <!-- carte 4-->

                        <div class="col-xs-2 carte" id="c4">
                            <img src="<?php echo $main[3] ?>" alt="carte4" />                                   
                        </div>                       

                        <!-- carte 5-->

                        <div class="col-xs-2 carte" id="c5">
                            <img src="<?php echo $main[4] ?>" alt="carte5" />
                        </div>


                    </div>

                    <!--row des boutons-->
                    <div class="row">

                        <!--bouton 1-->
                        <div class="col-xs-offset-1 col-xs-2 bouton" id="bouton1">
                            <input type="button" value="garder" id="bou1" class="btn btn-primary" />
                        </div> 

                        <!--bouton 2-->
                        <div class="col-xs-2 bouton" id="bouton2">
                            <input type="button" value="garder" id="bou2" class="btn btn-primary" />
                        </div>

                        <!--bouton 3-->
                        <div class="col-xs-2 bouton" id="bouton3">
                            <input type="button" value="garder" id="bou3" class="btn btn-primary" />
                        </div>

                        <!--bouton 4-->
                        <div class="col-xs-2 bouton" id="bouton4">
                            <input type="button" value="garder" id="bou4" class="btn btn-primary" />  
                        </div>

                        <!--bouton 5-->
                        <div class="col-xs-2 bouton" id="bouton5">
                            <input type="button" value="garder" id="bou5" class="btn btn-primary" />
                        </div>
                    </div>                    
                
        
        <?php
                      }
        ?>
