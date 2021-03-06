<?php
session_start();
require 'backOffice/connexion.php';

$nbJeton = intval(json_decode($_POST['nbjeton']));
/******************************************
     *   MàJ DES JETONS DANS LA BDD            *
     ******************************************/

// Partie Temporaire
if($_SESSION['partieTemp']){
    $id = $_SESSION['id_admin'];
    $date = $_SESSION['date'];


    $miseAJour = $bdd->prepare('UPDATE joueur_temporaire SET jeton_jt = :jeton WHERE id_admin= :id AND date_jt = :date');
    $miseAJour->bindParam(':jeton', $nbJeton, PDO::PARAM_INT);
    $miseAJour->bindParam(':date', $date);
    $miseAJour->bindParam(':id', $id);
    $verif = $miseAJour->execute();
    $miseAJour->closeCursor();
    if($verif){
        $_SESSION['reload'] = true;
    }

    // Partie logger
}else{
    $id = $_SESSION['id'];


    $miseAJour = $bdd->prepare('UPDATE joueur SET jeton_jou = :jeton WHERE id_jou= :id');
    $miseAJour->bindParam(':jeton', $nbJeton, PDO::PARAM_INT);
    $miseAJour->bindParam(':id', $id);
    $verif = $miseAJour->execute();
    $miseAJour->closeCursor();
    if($verif){
        $_SESSION['reload'] = true;
    }
}

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
