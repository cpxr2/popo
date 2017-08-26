$("#donne1").click( function(){

    $.ajax({
            type: "POST",
            url: "donne1.php",
            data: "",
            contentType: "application/json; charset=UTF-8",
            dataType: "json",
            success: function (msg) {
                if (msg.error === 'success') {
                    alert('SUCCESS')
                } 
                else {
                    alert('ERROR' + msg.error)
                }
            }

        }).done(function(msg) {
            alert( "Data Saved: " + msg );
        });
    
    $("#donne1").hide(); // j'enleve le bouton distribuer
    $("#donne2").show(); // je met le 2eme bouton
    $(".bouton").show(); // je met les boutons pour garder les cartes
});