<?php

// Variable setter pour le teste
/*$_POST["new"] = 3;
$_POST["carteTirer"] = 2;*/

if(isset($_POST["new"])){

    $nbCartes = $_POST["new"]; //le nombre de nouvelles cartes à tirer
    $carteTirer = json_decode($_POST["carteTirer"]); //tableau des cartes déjà tirées
    $newDonne=[]; // tableau des cartes à renvoyer en ajax

    for($i=0; $i<$nbCartes; $i++)// on tire le nombre de carte qui sont en TRUE.
    {

        do
        {
            //On tire une carte.
            $nb = rand(1,52);
            $carte = $nb;

            //On vérifie si elle est pas deja dans la main.
            $dejaTirer = false;

            for($j=0; $j<$i; $j++)
            {

                if($carte == $carteTirer[$j])//Si elle est deja tirer on passe en TRUE et on retire
                {
                    $dejaTirer = true;
                    break;
                }
            }
        }while($dejaTirer == true);

        // si elle est pas deja tirer on la met dans la main.
        $newDonne[$i] = $carte;       
    }

    $retour = json_encode($newDonne);
    echo $retour;

    //echo $_POST["carteTirer"];
    // print_r($newDonne);
}