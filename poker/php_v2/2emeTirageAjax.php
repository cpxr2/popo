<?php

// Variable setter pour le teste
/*
$_POST["new"] = 3;
$_POST["carteTirer"] = [0=>2, 1=>44];
$_POST["mainFinal"] = [0=>23, 1=>42];*/




if(isset($_POST['new'])){

    $nbCartes = $_POST['new']; //le nombre de nouvelles cartes à tirer
    $carteTirer = json_decode($_POST['carteTirer']); //tableau des cartes déjà tirées
    $mainFinal = json_decode($_POST['mainFinal']);
    //$mainFinal = $_POST['mainFinal'];
    //$carteTirer = $_POST['carteTirer']; //tableau des cartes déjà tirées
    $newDonne=[]; // tableau des cartes à renvoyer en ajax

    
    /******************************************
     *       TIRAGE DES CARTES                *
     ******************************************/
        
    
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

                if(array_search($carte, $carteTirer))//Si elle est deja tirer on passe en TRUE et on retire
                {
                    $dejaTirer = true;                    
                }
            }
        }while($dejaTirer == true);

        // si elle est pas deja tirer on la met dans la main.
        $carteTirer[count($carteTirer)] = $carte;
        $newDonne[$i] = $carte;
        $mainFinal[count($mainFinal)] = $carte;
    }
    
    /******************************************
     *   RECHERCHE CARTES DANS BDD            *
     ******************************************/

    $retour = json_encode($newDonne);
    //$retour = json_encode($carteTirer);
    
    echo $retour;
    //echo json_encode($carteTirer);
    
   /* echo '<br />';
    print_r($newDonne);
    echo '<br />';
     print_r($mainFinal);
    echo '<br />';
    echo count($carteTirer);*/

}