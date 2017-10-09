<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Article Drag</title>
        
<script src="https://use.fontawesome.com/fe74c9687c.js"></script>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="page">

                        <!-- la zone de drop-->
                        <div id="page_drop"></div>
                    </div>
                </div>
            </div>
               <div class="row">
               <div class="col-xs-12" id="menu">
                <button id="btnTexte" class="btn btn-basic"><i class="fa fa-font" aria-hidden="true"></i>
                <button id="btnImg" class="btn btn-basic"><i class="fa fa-picture-o" aria-hidden="true"></i>

</button>
               </div>
            </div>
                <br /><br />


                <!--la zone de saisie-->
                <div id="texte">
                    <label for="text_drag">Saisir du texte</label>
                    <textarea id="text_drag"></textarea>
                    <button id="b1">Valider</button>
                </div>
                <div id="image">
                    <label for="img_drag">Ajouter une image</label>
                    <input type="file" id="img_drag" />
                    <button id="b2">Valider</button>
                </div>

                <br /><br />

                <!--la zone ou le texte apparait-->
                <div id="recoit"></div>

            </div>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <script src="js/script.js"></script>

    </body>
</html>
<!--Ad quibusdam fidelissimae, se do magna voluptate.-->