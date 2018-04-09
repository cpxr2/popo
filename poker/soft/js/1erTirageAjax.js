var main = [];
var carteTirer = [];


$("#donne1").click( function(){


    if(nbJeton<=0)
    {
        $("#resultat").show();
        $("#resultat").html("Vous n'avez plus de jetons.<br />Déconnectez vous et faites en ajouter.");
        $("#donne1").hide();
    }
    else
    {
        nbJeton = nbJeton - pari;
        $("#nbjeton").html(nbJeton);
        $.post(
            '1erTirageAjax.php',

            function(data){
                for(i=0; i<5; i++){
                    $("#c" + i).attr("src", "../images/(" + data[i] + ").png");
                    main[i] = data[i];
                    carteTirer[i] = data[i];
                }
                // affichage pour debug
                /*console.log( "Le 1er clic");
                console.log( "Toutes les datas du 1er clic : ");
                console.log(data); 
                console.log("Le pari soustrait a nbJeton : ");
                console.log(pari);
                console.log("Le nombre total de jeton");
                console.log(nbJeton);*/
            },
            'json'
        );



        $("#donne1").hide(); // j'enleve le bouton distribuer
        $("#donne2").show(); // je met le 2eme bouton
        $("#plus").hide(); // j'enlève les boutons de pari
        $("#moins").hide(); // j'enlève les boutons de pari
        //$(".bouton").show(); // je met les boutons pour garder les cartes

        //fonctions qui active le clic sur les cartes
        clicCard("#c0", "#c0", 0, 0, 0);
        clicCard("#c1", "#c1", 1, 1, 1);
        clicCard("#c2", "#c2", 2, 2, 2);
        clicCard("#c3", "#c3", 3, 3, 3);
        clicCard("#c4", "#c4", 4, 4, 4);
    }
});
