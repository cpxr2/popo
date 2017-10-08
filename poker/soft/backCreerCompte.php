<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Créer un joueur</title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="css/backStyle.css">
    </head>
    <body>
        <div class="container" id="page">
            <!--***************** FIN HTML ******************************-->


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
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" /><span class="rouge" id="etoileE"></span>
                        </div>
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
            <?php
    if(isset($_POST['creer'])){
        require 'connexion.php';
        
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];

        $requete = $bdd->prepare('INSERT INTO joueur2(nom_jou, mdp_jou, acces_jou, id_admin, jeton_jou, email_jou) VALUES (:nom, 1, 1, 0, :email)');
        $requete->execute(array(':email'=>$email, ':nom'=>$pseudo));
        echo 'Nouveau joueur créer.';

    }  
            ?>
        </div>
        <script>
            $("#creer").click(function(e){                   

                var emailReg = /^¨([a-z0-9._-]+@[a-z0-9._-]+\\.[a-z]{2,4})?/;
                var emailaddressVal = $("#email").val();

                if(!emailReg.test(emailaddressVal)) {
                    $("#erreur").html("L'email n'est pas correcte");
                    $("#email").css("border", "2px solid red");
                    $("#etoileE").html(" *");                
                    e.preventDefault();
                }

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