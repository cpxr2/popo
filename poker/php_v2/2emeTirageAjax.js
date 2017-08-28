var nouvelleCarte = 0;

$("#donne2").click( function(){
    
for(i=0; i<5; i++){
    if(retire[i] == true){
        nouvelleCarte++;
    }
}
    
    $.post(
    '2emeTirageAjax.php',
        {new : nouvelleCarte}//j'envoi le nombre de nouvelle carte a tirer
        
        function(data){
            
        },
        'json'
    );
    console.log(carteTirer);
    $("#retour").show(); // j'enleve le bouton distribuer
    $("#donne2").hide(); // je met le 2eme bouton
    $(".bouton").hide(); // je met les boutons pour garder les cartes
});