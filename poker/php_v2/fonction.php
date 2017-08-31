<?php
function compareValeur($valeur)
{
    for($i=0; $i<5; $i++)
    {
        if($valeur[$i] == $valeur[$i+1] -1)
    }
}


function verfiMain($args){
    $couleur = [];
    $valeur = [];


    foreach($args as $carte)
    {
        $valeur[count($valeur)] = $carte['nombre_val'];
        $couleur[count($couleur)] = $carte['couleur_val'];
    }
   sort($valeur);
    
    
    
    
    
    print_r($valeur);
    echo '<br />';
    print_r($couleur);
}
