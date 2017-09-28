
$(document).ready(function(){
    $.post(
    'recupJetonAjax.php',
        
        function(data){            
                  
            nbJeton = parseInt(data);
            nbJetonInit = parseInt(data);
            
            $("#nbjeton").html(data);                                      
        },
        'json'
    );
    
});
