var nouvelleCarte = 0;
var mainFinal = [];

$("#donne2").click( function(){

    //console.log(carteTirer);

    for(i=0; i<5; i++){
        if(retire[i] == true){
            nouvelleCarte++;
        }else{
            mainFinal[mainFinal.length] = main[i]; //****************************
        }
    }


    $.post(
        '2emeTirageAjax.php',
        {
            "new" : nouvelleCarte, //j'envoi le nombre de nouvelle carte a tirer
            "carteTirer" : JSON.stringify(carteTirer), // j'envoi le tableau des cartes déjà tirées
            "mainFinal" : JSON.stringify(mainFinal) // j'envoi les cartes qui reste en mains
        },

        function(data){

            var nouvelleCarteTirer = 0;

            for(i=0; i<5; i++){
                if(retire[i] == true){
                    $("#c" + i).attr("src", "images/(" + data[nouvelleCarteTirer] + ").png");
                    nouvelleCarteTirer++;
                }
            }
               
        },
        'json'
    );

    $("#retour").show(); // je met le dernier bouton
    $("#donne2").hide(); // j'enlève le bouton "donne"
    $(".bouton").hide(); // j'enlève les boutons sous les cartes
});