var nouvelleCarte = 0;
var mainFinal = [];

$("#donne2").click( function(){
    clicCarte = false;
    

    for(i=0; i<5; i++){//une boucle qui compte le nombre de carte à changer
        if(retire[i] == true){
            nouvelleCarte++;
        }else{
            mainFinal[mainFinal.length] = main[i]; //ici on met les cartes que l'on garde dans la main final
        }
    }
    //afiichage pour débug
    console.log("*************************************************");
    console.log("Ce qui est envoyé au 2eme clic :");
    console.log("Nombre de nouvelles cartes à tirer : ");
    console.log(nouvelleCarte);
    console.log("Les cartes deja tirer : ");
    console.log(carteTirer);
    console.log("Les cartes qui restent en main : ");
    console.log(mainFinal);
    console.log("Le montant du pari : ");
    console.log(pari);
    console.log("Le nombre de jetons qu'il restent : ");
    console.log(nbJeton);

    $.post(
        '2emeTirageAjax.php',
        {
            "new" : nouvelleCarte, //j'envoi le nombre de nouvelle carte a tirer
            "carteTirer" : JSON.stringify(carteTirer), // j'envoi le tableau des cartes déjà tirées
            "mainFinal" : JSON.stringify(mainFinal), // j'envoi les cartes qui reste en mains
            "pari" : JSON.stringify(pari),// envoi de la somme parié
            "totalJeton" : JSON.stringify(nbJeton)// j'envoi les jetons qu'il reste pour mettre a jour la bdd
        },

        function(data){

            var nouvelleCarteTirer = 0; //variable qui sert a trouver où placer les nouvelles cartes
            
            console.log("les datas retourner : "); //affichage console pour teste
            console.log(data);
            console.log("*******************************************");
            
            // boucle qui met les cartes a leur BONNE place
            for(i=0; i<5; i++){
                if(retire[i] == true){//vérifie si l'on doit changer cette carte ou pas
                    $("#c" + i).attr("src", "../images/(" + data[nouvelleCarteTirer] + ").png");
                    nouvelleCarteTirer++;
                }

            }
            
            $("#resultat").show();//fait apparaitre le bandeau de résultat
            $("#mainGagnante").html(data[data.length-1] + " !!!");//affiche la main gagnante
            if(data[data.length-2] != 0)//si les gains ne sont pas nul on les affiches
            {
                $("#gain").html("<br />Vous avez gagner " + data[data.length-2] + " jetons.");
            }
            nbJeton = nbJeton + data[data.length-2];//on met a jour et on affiche le nombre total de jeton
            $("#nbjeton").html(nbJeton);
            
            nbJetonInit = nbJetonInit + data[data.length-2];//on met a jour le total de jeton qui sert de vérif

        },
        'json'
    );

    $("#donne2").hide(); // j'enlève le bouton "donne"
    $("#retour").show(); // je met le dernier bouton
    $(".bouton").hide(); // j'enlève les boutons sous les cartes

    //desactive le clic sur les cartes
    $( "#c0" ).unbind( "click");
    $( "#c1" ).unbind( "click");
    $( "#c2" ).unbind( "click");
    $( "#c3" ).unbind( "click");
    $( "#c4" ).unbind( "click");
});