var compteur = [0, 0, 0, 0, 0];
var nbJetonInit = 0;
var retire = new Array(false, false, false, false, false);


//cache la bannière qui affiche les résultats
$("#resultat").hide();


// Le clic sur le bouton "retour" réinitialise tout
$("#retour").click(function(){
    for(i=0; i<5; i++){
        $("#c" + i).attr("src", "../images/(53).png");
        //$("#bou" + (i+1)).attr("class","btn btn-primary");
    }
    $("#retour").hide();
    $("#donne1").show();
    $("#plus").show();
    $("#moins").show();

    carteTirer = [];
    retire = new Array(false, false, false, false, false);
    compteur = [0, 0, 0, 0, 0];
    nouvelleCarte = 0;
    mainFinal = [];
    $("#montant").html(pari);
    $("#resultat").hide();
    $("#gain").html("");
});

function clicCard (btnclick, carte, cpt, nbCard, retirer){

    $(btnclick).bind("click", function(){
        compteur[cpt] ++;
        if(compteur[cpt] %2==0)
        {
            $(carte).attr("src", "../images/(" + main[nbCard] + ").png");
            retire[retirer] = false;
        }else{
            $(carte).attr("src", "../images/(53).png");
            retire[retirer] = true;
        }
    });
};
