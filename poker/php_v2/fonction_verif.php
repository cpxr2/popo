<?php

/*****************************************************
    QUINTE, FLUSH ET ROYAL   
******************************************************/


function quinte($valeur= '', $couleur='') 
    //le paramètre '$type' permet defini la main recherché (royal ou couleur)
{
    $royal = [1, 10, 11, 12, 13];
    $gagner = [true,true,true,true,true];
    $verifVal = [false,false,false,false,false];
    $verifCoul = [false,false,false,false,false];

    for($i=0; $i<4; $i++) //on verifie les 5 cartes avec la boucle
    {

        if($valeur[$i] == ($valeur[$i+1] -1)) // on compare si la 2eme valeur - 1 est égale à la première
        {
            $verifVal[$i] = true; // si c'est bon on met true dans le tableau
        }

        if($couleur[$i] == $couleur[$i+1]) //verif des couleurs
        {
            $verifCoul[$i] = true; // si c'est bon on met true dans le tableau
        }

    }

    $verifVal[4] = true;// le dernier indice du tableau n'est pas verifié, alors on le set a true pour compléter le tableau
    $verifCoul[4] = true;

    if(($gagner == $verifCoul) && ($royal == $verifVal))
    {
        return 'quinte royal';
    }
    elseif(($gagner == $verifCoul) && ($gagner == $verifVal))//on compare les 2 tableaux et si ils sont égaux on retourne true
    {
        return 'quinte flush';
    }

    elseif($gagner == $verifCoul)
    {
        return 'couleur';
    }
    elseif($gagner == $verifVal)
    {
        return 'quinte';
    }
    else
    {
        return false;
    }
}

/*****************************************************
    CARREF, FULL, BRELAN, DOUBLE PAIRE   
******************************************************/


function carteIdentique($valeur) // carré, full, brelan et double paires.
{
    //variable de vérification

    $carre = [1,4];
    $full = [2,3];
    $brelan = [1,1,3];
    $paire = [1,2,2];

    //traitement du tableau
    $retour = array_count_values($valeur); // on tri les valeurs du tableau

    $retourInv = array_values($retour); //on change les indices du tableau

    sort($retourInv); //on tri pour la verif du full


    // verif de la main

    if($retourInv == $carre)
    {
        return 'carré';
    }
    elseif($retourInv == $full)
    {
        return 'full house';
    }
    elseif($retourInv == $brelan)
    {
        return 'brelan';
    }
    elseif($retourInv == $paire)
    {
        return '2 paires';
    }
    else
    {
        return false;    
    }

}

/******************************************
     *          VERIF MAIN                    *
     ******************************************/

function verifMain($args){
    $couleur = [];
    $valeur = [];


    foreach($args as $carte)//on extrait les données du tableau envoyer par la requete
    {
        $valeur[count($valeur)] = $carte['nombre_val'];     //on met la valeur de chaque carte dans un table
        $couleur[count($couleur)] = $carte['couleur_val'];  //on met la couleur de chaque carte dans un tableau
    }
    sort($valeur); // je trie le tableau de valeur dans  l'ordre croissant pour le comparer

    
    // on utilise les 2 fonctions pour vérifier les cartes
    $verifQuinte = quinte($valeur, $couleur);
    $verifCarre = carteIdentique($valeur);
    
    if($verifQuinte != false) //si la valeur de verifQuinte est false, je renvoi obligatoirement la valeur de verifCarre qui est ou un main gagnante ou false si rien ne gagne.
    {
        return $verifQuinte;
    }
    elseif($verifCarre == false)
    {
        return 'perdu';
    }
    else
    {
    return $verifCarre;    
    }

}