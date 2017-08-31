<?php
function verfiMain($args){
    $couleur = [];
    $valeur = [];


    foreach($args as $carte)
    {
        $valeur[count($valeur)] = $carte['nombre_val'];
        $couleur[count($couleur)] = $carte['couleur_val'];
    }
   //sort($valeur);
    print_r($valeur);
    echo '<br />';
    print_r($couleur);
}
