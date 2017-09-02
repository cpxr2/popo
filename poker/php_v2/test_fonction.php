<?php
require 'fonction.php';

// TEST DE TRI DE TABLEAU   

$t = [0=>23, 1=>42, 2=>5, 3=>13, 4=>95];

$tab1 = [0=>23, 1=>42, 2=>5, 3=>13, 4=>95];

    print_r($t);
    echo '<br />';
  // sort($t);
    echo '<br />';
    print_r($t);
    echo '<br /><br />';
   // print_r($couleur);

if($t == $tab1)
{
    echo 'les tableaux sont egaux';
}
else{
    echo 'PAS EGAUX';
}
echo '<br /><br />';






//TEST DE LA FONCTION verifMain()

$mainTest =array( 
    0 => array( 'nombre_val' => 1, 'couleur_val' => 'trefle'), 
    1 => array( 'nombre_val' => 6, 'couleur_val' => 'pique'), 
    2 => array( 'nombre_val' => 8, 'couleur_val' => 'trefle'), 
    3 => array( 'nombre_val' => 9, 'couleur_val' => 'coeur'), 
    4 => array( 'nombre_val' => 12, 'couleur_val' => 'coeur') );
    
$quinteTest =array( 
    0 => array( 'nombre_val' => 8, 'couleur_val' => 'trefle'), 
    1 => array( 'nombre_val' => 9, 'couleur_val' => 'trefle'), 
    2 => array( 'nombre_val' => 10, 'couleur_val' => 'trefle'), 
    3 => array( 'nombre_val' => 11, 'couleur_val' => 'trefle'), 
    4 => array( 'nombre_val' => 12, 'couleur_val' => 'trefle') );

verfiMain($mainTest);
echo '<br /><br />';
verfiMain($quinteTest);
echo '<br /><br />';







// TEST DE LA FONCTION compare5Cartes()

$tabChiffre=[0=>5, 1=>6, 2=>7, 3=>8, 4=>9];
$tabCouleur=[0=>'coeur', 1=>'coeur', 2=>'coeur', 3=>'coeur', 4=>'coeur'];

$verifChiffreTest = compare5Cartes($tabChiffre, 'valeur');
echo $verifChiffreTest;
echo '<br /><br />';

$verifCouleurTest = compare5Cartes($tabCouleur);
echo $verifCouleurTest;
echo '<br /><br />';





