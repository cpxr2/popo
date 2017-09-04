<?php

/******************************************
     *          QUINTE FLUSH  ROYAL           *
     ******************************************/

function quinteFlushRoyal($valeur, $couleur) //le paramètre $type permet vérifié la couleur ou la valeur
{
    $gagner = [true,true,true,true,true];
    $gagnerval = [0=>10, 1=>11, 2=>12, 3=>13, 4=>1];
    $verifVal = false;
    $verifCoul = [false,false,false,false,false];

    for($i=0; $i<4; $i++) //on verifie les 5 cartes avec la boucle
    {
        
            if($valeur == $gagnerval) // on compare si la 2eme valeur - 1 est égale à la première
            {
                $verifVal = true; // si c'est bon on met true dans le tableau
            }
        
            if($couleur[$i] == $couleur[$i+1]) //verif des couleurs
            {
                $verifCoul[$i] = true; // si c'est bon on met true dans le tableau
            }
        
    }

    $verif[4] = true;// le dernier indice du tableau n'est pas verifié, alors on le set a true pour compléter le tableau

    if(($gagner == $verif) && $verifVal) //on compare les 2 tableaux et si ils sont égaux on retourne true
    {
        return 'quinte flush';
        //return 'vrai';
    }
    else{
        return false;
        //return 'faux';
    }
}


/******************************************
     *          QUINTE FLUSH                  *
     ******************************************/

function quinteFlush($valeur, $couleur) //le paramètre $type permet vérifié la couleur ou la valeur
{
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

    if(($gagner == $verifCoul) && ($gagner == $verifVal))//on compare les 2 tableaux et si ils sont égaux on retourne true
    {
        return 'quinte flush';
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

function carre($valeur)
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
        return 'carré';
    }
    else
    {
        return false;
    }
}

/******************************************
     *       FULL HOUSE                       *
     ******************************************/

function full($valeur)
{   
    //je vérife si les valeur sont égalent a la forme du "full" 11122 ou 22211
    if((($valeur[0] == $valeur[1]) && ($valeur[2] == $valeur[3]) && ($valeur[3] == $valeur[4])) || ((($valeur[0] == $valeur[1]) && ($valeur[1] == $valeur[2])) && ($valeur[3] == $valeur[4])))

    {
        return 'full';     
    }
    else
    {
        return false;
    }
}

/******************************************
     *          COULEUR                       *
     ******************************************/

function couleur($couleur) //le paramètre $type permet vérifié la couleur ou la valeur
{
    $gagner = [true,true,true,true,true];    
    $verifCoul = [false,false,false,false,false];

    for($i=0; $i<4; $i++) //on verifie les 5 cartes avec la boucle
    {
         if($couleur[$i] == $couleur[$i+1]) //verif des couleurs
            {
                $verifCoul[$i] = true; // si c'est bon on met true dans le tableau
            }
        
    }

    $verifCoul[4] = true;

    if($gagner == $verifCoul)//on compare les 2 tableaux et si ils sont égaux on retourne true
    {
        return 'couleur';
        //return 'vrai';
    }
    else{
        return false;
        //return 'faux';
    }
}

/******************************************
     *          QUINTE                 *
     ******************************************/

function quinte($valeur) //le paramètre $type permet vérifié la couleur ou la valeur
{
    $gagner = [true,true,true,true,true];
    $verifVal = [false,false,false,false,false];    

    for($i=0; $i<4; $i++) //on verifie les 5 cartes avec la boucle
    {
        
            if($valeur[$i] == ($valeur[$i+1] -1)) // on compare si la 2eme valeur - 1 est égale à la première
            {
                $verifVal[$i] = true; // si c'est bon on met true dans le tableau
            }        
    }

    $verifVal[4] = true;// le dernier indice du tableau n'est pas verifié, alors on le set a true pour compléter le tableau
   
    if($gagner == $verifVal)//on compare les 2 tableaux et si ils sont égaux on retourne true
    {
        return 'quinte';
        //return 'vrai';
    }
    else{
        return false;
        //return 'faux';
    }
}

/******************************************
     *                BRELAN                  *
     ******************************************/

function brelan($valeur)
{
    $gagner = [false,false,true,true,true];
    $verif = [false,false,false,false,false];

    for($i=0; $i<4; $i++)
    {
        if($valeur[$i] == $valeur[$i+1])//je compare si la carte a la même valeur que la carte suivante
        {
            $verif[$i] = true;
        }
    }
    if(($valeur[4] == $valeur[0]) ||($valeur[4] == $valeur[1]) || ($valeur[4] == $valeur[2]))//je compare la derniere carte du tableau avec la premier et la 2eme
    {
        $verif[4] = true;
    }
    sort($verif);// je tri le tableau pour qu'il corresponde au tableau $gagne

    if($verif == $gagner)
    {
        return 'brelan';
    }
    else
    {
        return false;
    }
}

/******************************************
     *            DOUBLE PAIRE                *
     ******************************************/

//PEUT SERVIR POUR VERIFIER LE BRELAN ET LE CARRE


function doublePaire($valeur)
{
    $gagner = [false,true,true];
    $verif = [false,false,false];

    $retour = array_count_values($valeur); // on tri les valeurs du tableau
    
    $retourInv = array_values($retour); //on change les indices du tableau
    
    
    for($i=0; $i<count($retourInv) ; $i++) // on verifie si il y va des valeur a 2
    {
        if($retourInv[$i] == 2)
        {
            $verif[$i] = true;
        }
    }
    sort($verif);// je met le tableau dans l'ordre
    
       if($verif == $gagner)
    {
        return '2 paires';
    }
    else
    {
        return false;    
    }

}


function carteIdentique($valeur)
{
    $gagner = [false,true,true];
    $double = [false,false,false];

    $retour = array_count_values($valeur); // on tri les valeurs du tableau
    
    $retourInv = array_values($retour); //on change les indices du tableau
    
    
    for($i=0; $i<count($retourInv) ; $i++) // on verifie si il y va des valeur a 2
    {
        if($retourInv[$i] == 4)
        {
            return 'carré';
            break;
        }
        elseif($retourInv[$i] == 3)
        {
            return 'brelan';
            break;
        }
        if($retourInv[$i] == 2)
        {
            $verif[$i] = true;
        }
    }
    sort($verif);// je met le tableau dans l'ordre
    
       if($verif == $gagner)
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

    //fonction de recherche
    
}
