var compteur = [0, 0, 0, 0, 0];

var retire = new Array(false, false, false, false, false);

function selectCard (btnclick, carte, cpt, nbCard, retirer){  

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

selectCard("#bou1", "#c0", 0, 0, 0);
selectCard("#bou2", "#c1", 1, 1, 1);
selectCard("#bou3", "#c2", 2, 2, 2);
selectCard("#bou4", "#c3", 3, 3, 3);
selectCard("#bou5", "#c4", 4, 4, 4);