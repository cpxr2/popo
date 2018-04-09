<?php
require 'fonction_verif.php';

$mainTest =array( 
    0 => array( 'nombre_val' => 1, 'couleur_val' => 'trefle'), 
    1 => array( 'nombre_val' => 6, 'couleur_val' => 'pique'), 
    2 => array( 'nombre_val' => 8, 'couleur_val' => 'trefle'), 
    3 => array( 'nombre_val' => 9, 'couleur_val' => 'coeur'), 
    4 => array( 'nombre_val' => 12, 'couleur_val' => 'coeur') );

$brelanTest =array( 
    0 => array( 'nombre_val' => 3, 'couleur_val' => 'trefle'), 
    1 => array( 'nombre_val' => 3, 'couleur_val' => 'pique'), 
    2 => array( 'nombre_val' => 8, 'couleur_val' => 'trefle'), 
    3 => array( 'nombre_val' => 3, 'couleur_val' => 'coeur'), 
    4 => array( 'nombre_val' => 12, 'couleur_val' => 'coeur') );

$quinteTest =array( 
    0 => array( 'nombre_val' => 1, 'couleur_val' => 'trefle'), 
    1 => array( 'nombre_val' => 13, 'couleur_val' => 'trefle'), 
    2 => array( 'nombre_val' => 10, 'couleur_val' => 'coeur'), 
    3 => array( 'nombre_val' => 11, 'couleur_val' => 'trefle'), 
    4 => array( 'nombre_val' => 12, 'couleur_val' => 'trefle') );

$full = [0=>2, 1=>2, 2=>2, 3=>9, 4=>9];
$quinte = [0=>5, 1=>6, 2=>7, 3=>8, 4=>9];
$Couleur=[0=>'coeur', 1=>'coeur', 2=>'coeur', 3=>'coeur', 4=>'coeur'];
$carre = [0=>23, 1=>23, 2=>15, 3=>23, 4=>23];
$brelan = [0=>23, 1=>23, 2=>15, 3=>13, 4=>23];
$doublePaire=[0=>2, 1=>2, 2=>15, 3=>9, 4=>9];
$perdu=[0=>12, 1=>11, 2=>8, 3=>4, 4=>9];

$cIdent = carteIdentique($carre);
echo $cIdent;
echo '<br /><br />';
$cIdent = carteIdentique($full);
echo $cIdent;
echo '<br /><br />';
$cIdent = carteIdentique($doublePaire);
echo $cIdent;
echo '<br /><br />';
$cIdent = carteIdentique($perdu);
echo $cIdent;
echo '<br /><br />';

$main = verifMain($quinteTest);
echo 'Une quinte flush = ' . $main;
echo '<br /><br />';

$main2 = verifMain($mainTest);
echo $main2;
echo '<br /><br />';

$main3 = verifMain($brelanTest);
echo $main3;
echo '<br /><br />';

$passe = hash('sha256', 'aaa', false);
echo $passe;