$("#donne1").click( function(){

    $.post(
    'donne1.php',
        
        function(data){
            if(typeof data !== undefined){
            var mesCartes = JSON.parse(data);
            console.log("ça marche");
            }
            else{
                console.log("c'est la merde");
            }
        },
        'json'
    );
    
    $("#donne1").hide(); // j'enleve le bouton distribuer
    $("#donne2").show(); // je met le 2eme bouton
    $(".bouton").show(); // je met les boutons pour garder les cartes
});