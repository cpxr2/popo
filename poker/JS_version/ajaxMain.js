$(document).ready(function(){
    
    $("#donne2").click(function(){
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
        
        var jsonObjects = [];
        
        //creation d'un objet JSON
        /*var jsonObj1 = {};
        jsonObj1.c0 = main[0];
        jsonObj1.c1 = main[1];
        jsonObj1.c2 = main[2];
        jsonObj1.c3 = main[3];
        jsonObj1.c4 = main[4];*/
        
        /*jsonObj1.getC0 = function() {
            return this.c0;
        };
        jsonObj1.getC1 = function() {
            return this.c1;
        };
        jsonObj1.getC2 = function() {
            return this.C2;
        };
        jsonObj1.getC3 = function() {
            return this.c3;
        };
        jsonObj1.getC4 = function() {
            return this.c4;
        };
*/
        jsonObjects.push(jsonObj1);  

       // var data = JSON.stringify(jsonObjects);
        //var data = jsonObj1;
       //var data = { recup : jsonObjects };
 
        
        //requete ajax
        $.ajax({
            type: "POST",
            url: "reqAjax.php",
            data: {c0: main[0],c1: main[1],c2: main[2],c3: main[3],c4: main[4]},
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

        $(".bouton").hide();
        $("#donne2").hide();
        $("#retour").show();  
        console.log(data);
       
        
    });
});