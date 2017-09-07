<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Video Poker</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container" id="page">
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

                        <div class="col-xs-offset-1 col-xs-2 carte">
                            <img src="images/(53).png" alt="carte1" id="c0" />
                        </div>                           

                        <!-- carte 2-->

                        <div class="col-xs-2 carte">
                            <img src="images/(53).png" alt="carte2" id="c1" />
                        </div>                           

                        <!-- carte 3-->

                        <div class="col-xs-2 carte">
                            <img src="images/(53).png" alt="carte3" id="c2" />
                        </div>

                        <!-- carte 4-->

                        <div class="col-xs-2 carte">
                            <img src="images/(53).png" alt="carte4" id="c3" />                                   
                        </div>                       

                        <!-- carte 5-->

                        <div class="col-xs-2 carte">
                            <img src="images/(53).png" alt="carte5" id="c4" />
                        </div>


                    </div>

                    <!--row des boutons-->
                    <div class="row">


                        <div class="col-xs-offset-1 col-xs-2 bouton" style="display: none;" id="bouton1">
                            <input type="button" value="garder" id="bou1" class="btn btn-primary" />
                        </div> 


                        <div class="col-xs-2 bouton" style="display: none;" id="bouton2">
                            <input type="button" value="garder" id="bou2" class="btn btn-primary" />
                        </div>


                        <div class="col-xs-2 bouton" style="display: none;" id="bouton3">
                            <input type="button" value="garder" id="bou3" class="btn btn-primary" />
                        </div>


                        <div class="col-xs-2 bouton" style="display: none;" id="bouton4">
                            <input type="button" value="garder" id="bou4" class="btn btn-primary" />  
                        </div>


                        <div class="col-xs-2 bouton" style="display: none;" id="bouton5">
                            <input type="button" value="garder" id="bou5" class="btn btn-primary" />
                        </div>
                    </div>  

                    <!--les boutons qui distriue les cartes--> 
                    <div class="row">

                        <div class="col-xs-offset-5 col-xs-2 " id="dist1">

                            <button class="btn btn-primary btn-circle btn-xl" id="donne1">Distribuer</button>

                            <button class="btn btn-danger btn-circle btn-xl" style="display: none;" id="donne2" >Changer</button>

                            <button class="btn btn-success btn-circle btn-xl" style="display: none;" id="retour" >Retour</button>
                        </div>

                    </div>
                <div class="row">
                    <div class="col-lg-12" id="resultat"></div>
                </div>
                </div>
            </div> 
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="fonction_poker.js"></script>
        <script src="1erTirageAjax.js"></script>
        <script src="2emeTirageAjax.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
</html>
