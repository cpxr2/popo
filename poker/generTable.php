<?php


$jeuCarte = [0 => '1', 1 => '1', 2 => '1', 3 => '1', 4 => '2', 5 => '2', 6 => '2', 7 => '2', 8 => '3', 9 => '3', 10 => '3', 11 => '3', 12 => '4', 13 => '4', 14 => '4', 15 => '4', 16 => '5', 17 => '5', 18 => '5', 19 => '5', 20 => '6', 21 => '6', 22 => '6', 23 => '6', 24 => '7', 25 => '7', 26 => '7', 27 => '7', 28 => '8', 29 => '8', 30 => '8', 31 => '8', 32 => '9', 33 => '9', 34 => '9', 35 => '9', 36 => '10', 37 => '10', 38 => '10', 39 => '10', 40 => 'Q', 41 => 'Q', 42 => 'Q', 43 => 'Q', 44 => 'R', 45 => 'R', 46 => 'R', 47 => 'R', 48 => 'V', 49 => 'V', 50 => 'V', 51 => 'V'];


$symbole = [1 => 'carreau', 2 => 'coeur', 3 => 'pique', 4 => 'trefle'];

$couleur= [1 => 'rouge', 2 => 'rouge', 3 => 'noir', 4 => 'noir'];
/*INSERT INTO `valeur_carte`(`id_val`, `chemin_carte_val`, `couleur_val`, `nombre_val`, `symbole_val`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])*/
$C=0;
$indice = 1;
for ($i=1; $i<14; $i++){
    for($j=1; $j<5; $j++){
       echo "('images/($indice).png', '$couleur[$j]', '$jeuCarte[$C]', '$symbole[$j]'),<br/>";
        $indice ++;
        $C ++;
    }
}

