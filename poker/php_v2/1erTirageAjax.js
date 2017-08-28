var main = [];
var carteTirer = [];


$("#donne1").click( function(){
    $.post(
    '1erTirageAjax.php',
        
        function(data){
            for(i=0; i<5; i++){
                $("#c" + i).attr("src", "images/(" + data[i] + ").png");
                main[i] = data[i];
                carteTirer[i] = data[i];
            }
                        
        },
        'json'
    );
    
    $("#donne1").hide(); // j'enleve le bouton distribuer
    $("#donne2").show(); // je met le 2eme bouton
    $(".bouton").show(); // je met les boutons pour garder les cartes
});