
$(document).ready(function(){
    $.post(
    'recupJetonAjax.php',

        function(data){
            console.log(data);

            var nbJeton = parseInt(data['nbJeton']);
            var nbJetonInit = parseInt(data['nbJeton']);

            $("#nbjeton").html(nbJeton);


            var mise = parseInt(data['mise']);
            var max = parseInt(data['mise_max']);
            var pari = mise;

        //affiche le montant a parier
        $("#montant").html(pari);

        //bouton "+" pour augmenter le pari
        $("#plus").click(function(){

            if(((nbJeton-mise)>0) && (pari<max))
            {
                pari = pari + mise;
            }
            $("#montant").html(pari);
        });

        //bouton "-" pour diminuer le pari, mais pas en dessous de 10
        $("#moins").click(function(){

            if(((nbJeton-mise)>0) && (pari>mise))
            {
                pari = pari - mise;
            }
            $("#montant").html(pari);
        });
        },
        'json'
    );

});
