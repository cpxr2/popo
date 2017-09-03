<?php

    /******************************************
     *          QUINTE FLUSH                  *
     ******************************************/

function compareQuinte($valeur, $type="") //le paramètre $type permet vérifié la couleur ou la valeur
{
    $gagner = [true,true,true,true,true];
    $verif = [false,false,false,false,false];

    for($i=0; $i<4; $i++) //on verifie les 5 cartes avec la boucle
    {
        // $verif[$i] = false; // on remplie le tableau $verif avec "false" a chaque passage

        if($type == 'valeur'){ // si je met "valeur" en paramétre, je vérifie la valeur

            if($valeur[$i] == ($valeur[$i+1] -1)) // on compare si la 2eme valeur - 1 est égale à la première
            {
                $verif[$i] = true; // si c'est bon on met true dans le tableau
            }
        }
        else //sinon je vérifie la couleur
        {
            if($valeur[$i] == $valeur[$i+1]) //verif des couleurs
            {
                $verif[$i] = true; // si c'est bon on met true dans le tableau
            }
        }
    }

    $verif[4] = true;// le dernier indice du tableau n'est pas verifié, alors on le set a true pour compléter le tableau

    if($gagner == $verif) //on compare les 2 tableaux et si ils sont égaux on retourne true
    {
        return true;
        //return 'vrai';
    }
    else{
        return false;
        //return 'faux';
    }
}

    /******************************************
     *          CARRE                         *
     ******************************************/

function compareCarre($valeur)
{
    $gagner = [false,true,true,true,true];
    $verif = [false,false,false,false,false];

    for($i=0; $i<4; $i++)
    {
        if($valeur[$i] == $valeur[$i+1])//je compare si la carte a la même valeur que la carte suivante
        {
            $verif[$i] = true;
        }
    }
    if(($valeur[4] == $valeur[0]) ||($valeur[4] == $valeur[1]))//je compare la derniere carte du tableau avec la premier et la 2eme
    {
        $verif[4] = true;
    }
    sort($verif);// je tri le tableau pour qu'il corresponde au tableau $gagne

    if($verif == $gagner)
    {
        return true;
    }
    else
    {
        return false;
    }
}

    /******************************************
     *       FULL HOUSE                       *
     ******************************************/

function compareFull($valeur)
{
   $verif = [false,false,false,false,false];
    
}

function verifMain($args){
    $couleur = [];
    $valeur = [];


    foreach($args as $carte)//on extrait les données du tableau envoyer par la requete
    {
        $valeur[count($valeur)] = $carte['nombre_val'];     //on met la valeur de chaque carte dans un table
        $couleur[count($couleur)] = $carte['couleur_val'];  //on met la couleur de chaque carte dans un tableau
    }
    sort($valeur); // je trie le tableau de valeur dans  l'ordre croissant pour le comparer

    $valeur5 = compareQuinte($valeur, 'valeur');
    $couleur5 = compareQuinte($couleur);

    if(($valeur5 == true) and ($couleur5 == true))
    {
        echo 'gagner';
    }
    else
    {
        echo 'perdu';
    }


    /* print_r($valeur);
    echo '<br />';
    print_r($couleur);*/
}
