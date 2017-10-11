var i = 0;
var t = 0;


boutonMenu("#btnTexte", "#texte", t);
boutonMenu("#btnImg", "#image", i);


//en cliquant sur le bouton
$("#b1").click(function(){
    // recuperation du text
    $("#saisie").append('<div class="drag ">' + $("#text_drag").val() + '</div>');
    //on vide la zone de saisie
    $("#text_drag").val("");
    if($("#saisie").val() != ""){
        $("#saisie").addClass("cadre");
    }

});


$("#saisie").draggable({
    containment: '#page_drop',
    grid: [20,20]
});

$("#page_drop").droppable({
   drop: function(draggable){
       var contenu = $("#saisie").val();
       $.post(
       'article_ajax.php',
           {
               "contenu": JSON.stringify(contenu)
           },
           function(data){
       console.log(data);
       },
           'json'
       );
   } 
});






