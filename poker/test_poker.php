<?php
$jeu_carte = array(
    0=>'1_carreau',
    1=>'2_carreau',
    2=>'3_carreau',
    3=>'4_carreau',
    4=>'5_carreau',
    5=>'6_carreau',
    6=>'7_carreau',
    7=>'8_carreau',
    8=>'9_carreau',
    9=>'10_carreau',
    10=>'v_carreau',
    11=>'d_carreau',
    12=>'r_carreau',

    13=>'1_trefle',
    14=>'2_trefle',
    15=>'3_trefle',
    16=>'4_trefle',
    17=>'5_trefle',
    18=>'6_trefle',
    19=>'7_trefle',
    20=>'8_trefle',
    21=>'9_trefle',
    22=>'10_trefle',
    23=>'v_trefle',
    24=>'d_trefle',
    25=>'r_trefle',

    26=>'1_coeur',
    27=>'2_coeur',
    28=>'3_coeur',
    29=>'4_coeur',
    30=>'5_coeur',
    31=>'6_coeur',
    32=>'7_coeur',
    33=>'8_coeur',
    34=>'9_coeur',
    35=>'10_coeur',
    36=>'v_coeur',
    37=>'d_coeur',
    38=>'r_coeur',

    39=>'1_pique',
    40=>'2_pique',
    41=>'3_pique',
    42=>'4_pique',
    43=>'5_pique',
    44=>'6_pique',
    45=>'7_pique',
    46=>'8_pique',
    47=>'9_pique',
    48=>'10_pique',
    49=>'v_pique',
    50=>'d_pique',
    51=>'r_pique',

);
$main = [0=>'', 1=>'', 2=>'', 3=>'', 4=>''];

for( $i=0; $i<5; $i++)
{
    do
    {
        $nb = rand(0, 51);
    }
    while(($jeu_carte[$nb] == $main[0]) || ($jeu_carte[$nb] == $main[1]) || ($jeu_carte[$nb] == $main[2]) || ($jeu_carte[$nb] == $main[3]) || ($jeu_carte[$nb] == $main[4]));
       
        $main[$i] = $jeu_carte[$nb];
}

for( $j=0; $j<5; $j++)
{
    echo $main[$j] . '<br />';
}