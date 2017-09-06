var compteur = [0, 0, 0, 0, 0];

var retire = new Array(false, false, false, false, false);

$("#resultat").hide();
//var clicCarte = false;

// La fonction qui gere les boutons sous les cartes
/*function selectCard (btnclick, carte, cpt, nbCard, retirer){  

    $(btnclick).click(function(){
        compteur[cpt] ++;
        if(compteur[cpt] %2==0)
        {  
            $(btnclick).attr("class","btn btn-primary");
            $(carte).attr("src", "images/(" + main[nbCard] + ").png");
            retire[retirer] = false;
        }else{
            $(btnclick).attr("class","btn btn-warning");
            $(carte).attr("src", "images/(53).png");
            retire[retirer] = true;
        } 
    });
};
//if(clicCarte){
selectCard("#bou1", "#c0", 0, 0, 0);
selectCard("#bou2", "#c1", 1, 1, 1);
selectCard("#bou3", "#c2", 2, 2, 2);
selectCard("#bou4", "#c3", 3, 3, 3);
selectCard("#bou5", "#c4", 4, 4, 4);*/
//}

// Le clic sur le bouton "retour" réinitialise tout
$("#retour").click(function(){
   for(i=0; i<5; i++){
       $("#c" + i).attr("src", "images/(53).png");
       //$("#bou" + (i+1)).attr("class","btn btn-primary");
   } 
    $("#retour").hide();
    $("#donne1").show();
    carteTirer = [];
    retire = new Array(false, false, false, false, false);
    compteur = [0, 0, 0, 0, 0];
    nouvelleCarte = 0;
    mainFinal = [];
    $("#resultat").hide();
});

function clicCard (btnclick, carte, cpt, nbCard, retirer){  

    $(btnclick).bind("click", function(){
        compteur[cpt] ++;
        if(compteur[cpt] %2==0)
        {  
            $(carte).attr("src", "images/(" + main[nbCard] + ").png");
            retire[retirer] = false;
        }else{
            $(carte).attr("src", "images/(53).png");
            retire[retirer] = true;
        } 
    });
};