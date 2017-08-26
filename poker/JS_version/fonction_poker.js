var compteur = [0, 0, 0, 0, 0];

var retire = new Array(false, false, false, false, false);

var carteTirer = [];
var main = [];

function nombreAleatoire() {
    var nb = Math.ceil(Math.random() * 52);
    return nb;
}

//en cliquant sur "distribuer" je tire et j'affiche 5 cartes aleatoires
$("#donne1").click( function(){

    for(i=1; i<6; i++)
    {
        do
        {
            // je tire une carte
            var nb = nombreAleatoire();
            var carte = "images/(" + nb + ").png";
            // je verifie si elle a pas deja été tirée
            for (j=0; j<5; j++)
            {
                if (nb == carteTirer[j])
                {
                    var dejaTirer = true;
                }
                else
                {
                    dejaTirer = false;
                }
            }
        }while(dejaTirer == true);

        $("#c" + i).attr("src", carte);
        carteTirer[i-1] = nb;
        main[i-1] = nb;
    }
    $("#donne1").hide(); // j'enleve le bouton distribuer
    $("#donne2").show(); // je met le 2eme bouton
    $(".bouton").show(); // je met les boutons pour garder les cartes
});

// je selection un carte et j'envoie "true" ou "false dans l'array "retire" pour savoir si je la change ou pas
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

/*$("#donne2").click(function(){
    for (i=0; i<5; i++)
    {
        if(retire[i] === true){
            do
            {
                // je tire une carte
                var nb = nombreAleatoire();
                var carte = "images/(" + nb + ").png";
                // je verifie si elle a pas deja été tirée
                for (j=0; j<carteTirer.length ; j++)
                {
                    if (nb == carteTirer[j])
                    {
                        var dejaTirer = true;
                    }
                    else
                    {
                        dejaTirer = false;
                    }
                }
            }while(dejaTirer == true);

            carteTirer[carteTirer.length] = nb;
            main[i] = nb;
            $("#c" + (i+1)).attr("src", "images/(" + nb + ").png");
        }
    }
    //requete ajax qui marche pas
    $.post(
        'reqAjax.php',
        {
            mainDeCarte : main,
        },
            function(data){
                if( data == 'Success'){
                    $("#resAjax").html("<p>la requete ajax a marché<p>")
                }
                else
                    {
                        $("#resAjax").html("<p>froirade<p>")
                    }
            },
            'text'
        );

$(".bouton").hide();
$("#donne2").hide();
$("#retour").show();    
});*/

$("#retour").click(function(){
   for(i=1; i<6; i++){
       $("#c" + i).attr("src", "images/(53).png");
       $("#bou" + i).attr("class","btn btn-primary");
   } 
    $("#retour").hide();
    $("#donne1").show();
    carteTirer = [];
    retire = new Array(false, false, false, false, false);
    compteur = [0, 0, 0, 0, 0];
    
});

 // TEST - affiche le contenu des tableaux pour verif
$("#menu").click(function(){
    console.log("les cartes tirer : " + carteTirer);
    console.log(retire);
    console.log(compteur);
    console.log("le contenu de la main : " + main);
    
})



