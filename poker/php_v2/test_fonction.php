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




// TEST DE LA FONCTION quinteFlush()
echo '<br  />********************************************<br />';
echo 'TEST quinteFlush()';
echo '<br  />********************************************<br />';
echo '<br /><br />';

$tabChiffre=[0=>5, 1=>6, 2=>7, 3=>8, 4=>9];
$tabCouleur=[0=>'coeur', 1=>'coeur', 2=>'coeur', 3=>'coeur', 4=>'coeur'];

$verifChiffreTest = quinteFlush($tabChiffre, 'valeur');
echo $verifChiffreTest;
echo '<br /><br />';

$verifCouleurTest = quinteFlush($tabChiffre, $tabCouleur);
echo $verifCouleurTest;
echo '<br /><br />';


// TEST Carre()
echo '********************************************<br />';
echo 'TEST Carre()';
echo '<br  />********************************************<br />';
echo '<br /><br />';

$carreTest = [0=>23, 1=>23, 2=>15, 3=>23, 4=>23];
$brelanTest = [0=>23, 1=>23, 2=>15, 3=>13, 4=>23];


$resErreurCarre = carre($carreTest);
echo 'Doit retourner \'perdu\' : ' . $resErreurCarre . ' .';
echo '<br /><br />';

$resErreurCarre = carre($brelanTest);
echo 'Doit retourner \'perdu\' : ' . $resErreurCarre . ' .';
echo '<br /><br />';

sort($carreTest);

$resCarre = carre($carreTest);
echo 'Doit retourner \'true\' : ' . $resCarre . ' .';
echo '<br /><br />';



//TEST DE RECHERCHE DANS UN TABLEAU
echo '********************************************<br />';
echo 'TEST DE RECHERCHE DANS UN TABLEAU';
echo '<br  />********************************************<br />';
echo '<br /><br />';

$json = json_encode($carreTest);
echo $json;

$quite = array(
    0=> array(0=>1, 1=>2, 2=>3, 3=>4, 4=>5),
    1=> array(0=>2, 1=>3, 2=>4, 3=>5, 4=>6),
    2=> array(0=>3, 1=>4, 2=>5, 3=>6, 4=>7),
    3=> array(0=>4, 1=>5, 2=>6, 3=>7, 4=>8),
    3=> array(0=>5, 1=>6, 2=>7, 3=>8, 4=>9)

);

if(!array_search($carreTest, $quite))
{
    echo 'La main est perdante';
}
else{
    echo 'Gagner !!!';
}
echo '<br /><br />';


//TEST DE LA FONCTION Full()
echo '********************************************<br />';
echo 'TEST DE Full()';
echo '<br  />********************************************<br />';
echo '<br /><br />';
$full1=[0=>2, 1=>2, 2=>9, 3=>9, 4=>9];
$full2=[0=>2, 1=>2, 2=>2, 3=>9, 4=>9];
$fullErreur=[0=>2, 1=>2, 2=>2, 3=>2, 4=>9];

$verifFull = full($full1);
echo 'Doit retourner \'gagner\' : ' . $verifFull . ' .';
echo '<br />';

$verifFull = full($fullErreur);
echo 'Doit retourner \'perdu\' : ' . $verifFull . ' .';
echo '<br />';

$verifFull = full($full2);
echo 'Doit retourner \'gagner\' : ' . $verifFull . ' .';
echo '<br /><br />';

// TEST Brelan()
echo '********************************************<br />';
echo 'TEST Brelan()';
echo '<br  />********************************************<br />';
echo '<br /><br />';
sort($brelanTest);
sort($carreTest);

$brelanTestverif = brelan($brelanTest);
echo 'doit retrouner \'gagner\' : ' . $brelanTestverif . ' .<br /><br />';

$brelanTestverif = brelan($carreTest);
echo 'doit retrouner \'perdu\' : ' . $brelanTestverif . ' .<br /><br />';



// TEST DoublePaire()
echo '********************************************<br />';
echo 'TEST DoublePaire()';
echo '<br  />********************************************<br />';
echo '<br /><br />';

$doublePaire1=[0=>2, 1=>2, 2=>15, 3=>9, 4=>9];
$doublePaire2=[0=>43, 1=>12, 2=>12, 3=>9, 4=>43];

$resPaire = doublePaire($doublePaire1);
echo 'doit retrouner \'gagner\' : ' . $resPaire . ' .<br /><br />';

$resPaire = doublePaire($doublePaire2);
echo 'doit retrouner \'gagner\' : ' . $resPaire . ' .<br /><br />';

$resPaire = doublePaire($brelanTest);
echo 'doit retrouner \'perdu\' : ' . $resPaire . ' .<br /><br />';

/*$tar = array_count_values($doublePaire1);
print_r($tar);
echo '<br />';
$tar2 = array_values($tar);
print_r($tar2);
echo '<br /><br />';*/



// TEST carteIdentique()
echo '********************************************<br />';
echo 'TEST carteIdentique()';
echo '<br  />********************************************<br />';
echo '<br /><br />';

$cIdent = carteIdentique($carreTest);
echo $cIdent;
echo '<br /><br />';

$cIdent = carteIdentique($doublePaire1);
echo $cIdent;
echo '<br /><br />';

$cIdent = carteIdentique($brelanTest);
echo $cIdent;
echo '<br /><br />';

$cIdent = carteIdentique($doublePaire2);
echo $cIdent;
echo '<br /><br />';

$royal = [1, 10, 11, 12, 13];
echo $cIdent;
echo '<br /><br />';

    $retour = json_encode($royal) . json_encode($cIdent);
    //$retour = json_encode($carteTirer);

    echo $retour;
