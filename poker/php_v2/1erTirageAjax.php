<?php

$main=[];

for($i=0; $i<5; $i++)// on tire les 5 cartes.
{
    
    do
    {
        //On tire une carte.
        $nb = rand(1,52);
        $carte = $nb;

        //On vérifie si elle est pas deja dans la main.
        $dejaTirer = false;
        
        for($j=0; $j<$i; $j++)//On vérifie les cartes en fonction du nombre dans $main grace a "$j<$i"
        {

            if($carte == $main[$j])//Si elle est deja tirer on passe en TRUE et on retire
            {
                $dejaTirer = true;
                break;
            }
        }
    }while($dejaTirer == true);

    // si elle est pas deja tirer on la met dans la main.
    $main[$i] = $carte;       
} 


//print_r($main);

$retour = json_encode($main);
echo $retour;






