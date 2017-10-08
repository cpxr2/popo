<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>

        <div id="page">
            <div class="page_drop">

            </div>
                <br /><br />
                <div id="test2">
                    <label for="text_drag">texte de test</label>
                    <input id="text_drag" type="text" name="sentence"><button id="b1">Valider</button>
                </div>
                <br /><br />
                <div class="test">

                </div>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>

            $(function(){

                $("#b1").click(function(){
                    $(".test").html($("#text_drag").val());
                    $("#text_drag").val("");
                });

                $(".test").draggable({
                    containment: ".page_drop",
                    grid: [20,20],
                    revert: true,
                    distance: 10
                });


                $(".page_drop").droppable();
            });

        </script>
    </body>
</html>
<!--Ad quibusdam fidelissimae, se do magna voluptate.-->