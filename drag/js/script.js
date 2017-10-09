function boutonMenu(btn, elm, cpt){
    $(btn).click(function(){
    cpt++;
    if(cpt%2){
        $(elm).show();
    }else{
        $(elm).hide();
    }    
});
}
$("#image").hide();
$("#texte").hide();
var t = 0;
var i = 0;

boutonMenu("#btnTexte", "#texte", t);
boutonMenu("#btnImg", "#image", i);


//en cliquant sur le bouton
$("#b1").click(function(){
    // recuperation du text
    $("#recoit").append('<div class="drag ">' + $("#text_drag").val() + '</div>');
    //on vide la zone de saisie
    $("#text_drag").val("");

});



if($("#text_drag").val() != ""){
    $("#recoit").addClass("cadre");
}

$("#recoit").draggable({
    //containment: '#page_drop'
});






