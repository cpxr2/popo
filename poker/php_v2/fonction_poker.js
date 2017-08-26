var compteur = [0, 0, 0, 0, 0];

var retire = new Array(false, false, false, false, false);

var carteTirer = [];
var main = [];

function selectCard (btnclick, carte, cpt, nbCard, retirer){  

    $(btnclick).click(function(){
        compteur[cpt] ++;
        if(compteur[cpt] %2==0)
        {  
            $(btnclick).attr("class","btn btn-primary");
            $(carte).attr("src", "images/(" + carteTirer[nbCard] + ").png");
            retire[retirer] = false;
        }else{
            $(btnclick).attr("class","btn btn-warning");
            $(carte).attr("src", "images/(53).png");
            retire[retirer] = true;
        } 
    });
};

selectCard("#bou1", "#c1", 0, 0, 0);
selectCard("#bou2", "#c2", 1, 1, 1);
selectCard("#bou3", "#c3", 2, 2, 2);
selectCard("#bou4", "#c4", 3, 3, 3);
selectCard("#bou5", "#c5", 4, 4, 4);