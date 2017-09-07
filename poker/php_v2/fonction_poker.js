var compteur = [0, 0, 0, 0, 0];

var retire = new Array(false, false, false, false, false);

var pari = 10;

$("#resultat").hide();

//affiche le montant a parier
$("#montant").html(pari);

//bouton "+" pour augmenter le pari
$("#plus").click(function(){
    pari = pari + 10;
    $("#montant").html(pari);
});

//bouton "-" pour diminuer le pari, mais pas en dessous de 10
$("#moins").click(function(){
    pari = pari - 10;
    $("#montant").html(pari);
    
    if(pari<10)
        {
            pari = 10;
            $("#montant").html(pari);
        }
});


// Le clic sur le bouton "retour" réinitialise tout
$("#retour").click(function(){
   for(i=0; i<5; i++){
       $("#c" + i).attr("src", "images/(53).png");
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