<?php
require 'fonction.php';

// TEST DE TRI DE TABLEAU 
echo 'TEST TRI DE TABLEAU';
echo '<br /><br />';

$t = [0=>23, 1=>42, 2=>5, 3=>13, 4=>95];

$tab1 = [0=>23, 1=>42, 2=>5, 3=>13, 4=>95];

$tabTrue = [0=>true, 1=>true, 2=>false, 3=>true, 4=>true];

    print_r($tabTrue);
    echo '<br />';
  sort($tabTrue);
    echo '<br />';
    print_r($tabTrue);
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
echo '********************************************<br />';
echo 'TEST verifMain()';
echo '<br  />********************************************<br />';
echo '<br /><br />';

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

verifMain($mainTest);
echo '<br /><br />';
verifMain($quinteTest);
echo '<br /><br />';




// TEST DE LA FONCTION compareQuinte()
echo '<br  />********************************************<br />';
echo 'TEST compareQuinte()';
echo '<br  />********************************************<br />';
echo '<br /><br />';

$tabChiffre=[0=>5, 1=>6, 2=>7, 3=>8, 4=>9];
$tabCouleur=[0=>'coeur', 1=>'coeur', 2=>'coeur', 3=>'coeur', 4=>'coeur'];

$verifChiffreTest = compareQuinte($tabChiffre, 'valeur');
echo $verifChiffreTest;
echo '<br /><br />';

$verifCouleurTest = compareQuinte($tabCouleur);
echo $verifCouleurTest;
echo '<br /><br />';


// TEST compareCarre()
echo '********************************************<br />';
echo 'TEST compareCarre()';
echo '<br  />********************************************<br />';
echo '<br /><br />';

$carreTest = [0=>23, 1=>23, 2=>15, 3=>23, 4=>23];
$brelanTest = [0=>23, 1=>23, 2=>15, 3=>13, 4=>23];


$resErreurCarre = compareCarre($carreTest);
echo 'Doit retourner \'perdu\' : ' . $resErreurCarre . ' .';
echo '<br /><br />';

$resErreurCarre = compareCarre($brelanTest);
echo 'Doit retourner \'perdu\' : ' . $resErreurCarre . ' .';
echo '<br /><br />';

sort($carreTest);

$resCarre = compareCarre($carreTest);
echo 'Doit retourner \'true\' : ' . $resCarre . ' .';
echo '<br /><br />';


