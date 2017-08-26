

var bouton = [document.getElementById("bou1"),
                       document.getElementById("bou2"),
                       document.getElementById("bou3"),
                       document.getElementById("bou4"),
                       document.getElementById("bou5")];

var compteur = [0,0,0,0,0];

var retire = [false, false, false, false, false];



bouton[0].addEventListener("click", function(){
    compteur[0] ++;
    if(compteur[0] %2==0)
    {  
        bouton[0].setAttribute("class","btn btn-primary");
        retire[0] = false;
    }else{
        bouton[0].setAttribute("class","btn btn-warning");
        retire[0] = true;
    }
});



$("#bou2").click( function (){
    compteur[1] ++;
    if(compteur[1] %2==0)
    {  
        bouton[1].setAttribute("class","btn btn-primary");
        var retire1 = false;
        $.ajax({
            url : "HTML_test_poker.php",
            type : "POST",
            data : "retire1=" + retire1,
            dataType : 'html'
        });
    }else{
        bouton[1].setAttribute("class","btn btn-warning");
        var retire1 = true;
    }
});

/*


bouton[1].addEventListener("click", function(){
    compteur[1] ++;
    if(compteur[1] %2==0)
    {  
        bouton[1].setAttribute("class","btn btn-primary");
        retire[1] = false;
    }else{
        bouton[1].setAttribute("class","btn btn-warning");
        retire[1] = true;
        
    }
});

bouton[2].addEventListener("click", function(){
    compteur[2] ++;
    if(compteur[2] %2==0)
    {  
        bouton[2].setAttribute("class","btn btn-primary");
        retire[2] = false;
    }else{
        bouton[2].setAttribute("class","btn btn-warning");
        retire[2] = true;
    }
});

bouton[3].addEventListener("click", function(){
    compteur[3] ++;
    if(compteur[3] %2==0)
    {  
        bouton[3].setAttribute("class","btn btn-primary");
        retire[3] = false;
    }else{
        bouton[3].setAttribute("class","btn btn-warning");
        retire[3] = true;
    }
});

bouton[4].addEventListener("click", function(){
    compteur[4] ++;
    if(compteur[4] %2==0)
    {  
        bouton[4].setAttribute("class","btn btn-primary");
        retire[4] = false;
    }else{
        bouton[4].setAttribute("class","btn btn-warning");
        retire[4] = true;
    }
});

*/
