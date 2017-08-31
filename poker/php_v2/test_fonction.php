<?php
require 'fonction.php';

$t = [0=>23, 1=>42, 2=>5, 3=>13, 4=>95];

$tab1 = [0=>23, 1=>42, 2=>5, 3=>13, 4=>95];

    print_r($t);
    echo '<br />';
  // sort($t);
    echo '<br />';
    print_r($t);
    echo '<br />';
    echo '<br />';
    echo '<br />';
   // print_r($couleur);

if($t === $tab1)
{
    echo 'les tableaux sont egaux';
}
else{
    echo 'PAS EGAUX';
}

$mainTest =array( 
    [0] => array( [nombre_val] => 1, [couleur_val] => trefle) 
    [1] => array( [nombre_val] => 6, [couleur_val] => pique) 
    [2] => array( [nombre_val] => 8, [couleur_val] => trefle) 
    [3] => array( [nombre_val] => 9, [couleur_val] => coeur) 
    [4] => array( [nombre_val] => 12, [couleur_val] => coeur) );
    
$quinte =array( 
    [0] => array( [nombre_val] => 8, [couleur_val] => trefle) 
    [1] => array( [nombre_val] => 9, [couleur_val] => trefle) 
    [2] => array( [nombre_val] => 10, [couleur_val] => trefle) 
    [3] => array( [nombre_val] => 11, [couleur_val] => trefle) 
    [4] => array( [nombre_val] => 12, [couleur_val] => trefle) );