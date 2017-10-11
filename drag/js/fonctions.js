function hideBouton(){
    $("#image").hide();
    $("#texte").hide();
}



function boutonMenu(btn, elm, cpt){
    
    hideBouton();
    $(btn).click(function(){
        cpt++;
        if(cpt%2){
            $(elm).show();
        }else{
            $(elm).hide();
        }    
    });
}