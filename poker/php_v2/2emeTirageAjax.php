<?php
session_start();
require 'backOffice/connexion.php';
require 'fonction_verif.php';

// Variable setter pour le teste

/*
$_POST["new"] = 3;
$_POST["carteTirer"] = [0=>2, 1=>44];
$_POST["mainFinal"] = [0=>23, 1=>42];
*/




//if(isset($_POST['new'])){

//vrai variable

$newDonne=[]; // tableau des cartes à renvoyer en ajax
$nbCartes = $_POST['new']; //le nombre de nouvelles cartes à tirer
$carteTirer = json_decode($_POST['carteTirer']); //tableau des cartes déjà tirées
$mainFinal = json_decode($_POST['mainFinal']);
$pari = json_decode($_POST['pari']); // la somme parier
$totalJeton = json_decode($_POST['totalJeton']);
//variable de teste

//$mainFinal = $_POST['mainFinal'];
//$carteTirer = $_POST['carteTirer']; //tableau des cartes déjà tirées


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
        $dejaTirer = true;

        for($j=0; $j<count($carteTirer); $j++)
        {

            if(!array_search($carte, $carteTirer))//Si elle est deja tirer on passe en TRUE et on retire
            {
                $dejaTirer = false;
            }
        }
    }while($dejaTirer == true);

    // si elle est pas deja tirer on la met dans la main.
    $carteTirer[count($carteTirer)] = $carte;
    $newDonne[$i] = $carte;// les cartes a changer
    $mainFinal[count($mainFinal)] = $carte;
}


/******************************************
     *   RECHERCHE CARTES DANS BDD            *
     ******************************************/

$requete = $bdd->prepare('SELECT * FROM valeur_carte WHERE id_val=:id0 OR id_val=:id1 OR id_val=:id2 OR id_val=:id3 OR id_val=:id4');
$requete->bindParam(':id0', $mainFinal[0]);
$requete->bindParam(':id1', $mainFinal[1]);
$requete->bindParam(':id2', $mainFinal[2]);
$requete->bindParam(':id3', $mainFinal[3]);
$requete->bindParam(':id4', $mainFinal[4]);
$requete->execute();

$resultat = $requete->fetchAll();
$requete->closeCursor();
/******************************************
     *   PLACE DES FONCTIONS DE VERIF          *
     ******************************************/

$gain = verifMain($resultat); // fonction qui verifie si la main est gagnante

$montantGagner = gain($pari, $gain); // fonction qui calcule le gain


/******************************************
     *   MàJ DES JETONS DANS LA BDD            *
     ******************************************/

<<<<<<< HEAD
$miseAJour = $bdd->prepare('UPDATE joueur SET jeton_jou = :jeton WHERE id_jou=:id');
$miseAJour->execute(array(':jeton'=>($totalJeton+$montantGagner), ':id'=>$_SESSION['id']));

=======
// Partie Temporaire
if($_SESSION['partieTemp']){
    $id = $_SESSION['id_admin'];
    $date = $_SESSION['date'];
    $newSolde = ($totalJeton+$gain);

    $miseAJour = $bdd->prepare('UPDATE joueur_temporaire SET jeton_jt = :jeton WHERE id_admin= :id AND date_jt = :date');
    $miseAJour->bindParam(':jeton', $newSolde);
    $miseAJour->bindParam(':date', $date);
    $miseAJour->bindParam(':id', $id);
    $miseAJour->execute();
    $miseAJour->closeCursor();

    // Partie logger
}else{
    $id = $_SESSION['id'];
    $newSolde = ($totalJeton+$gain);

    $miseAJour = $bdd->prepare('UPDATE joueur SET jeton_jou = :jeton WHERE id_jou= :id');
    $miseAJour->bindParam(':jeton', $newSolde);
    $miseAJour->bindParam(':id', $id);
    $miseAJour->execute();
    $miseAJour->closeCursor();
}
$_SESSION['nbJeton'] = $newSolde;
$_SESSION['reload'] = false;
>>>>>>> e0dc5378bcef06e5edcc7725d5e8e47f706d7507
/******************************************
     *          CREATION DU JSON               *
     ******************************************/

$newDonne[count($newDonne)] = $nbCartes; //retourne les carte a changé
$newDonne[count($newDonne)] = $montantGagner; //retroune le montant gagné
$newDonne[count($newDonne)] = $gain;//retourne le nom de la main gagnante

$retour = json_encode($newDonne);



echo $retour;
// echo json_encode($carteTirer);

/*echo '<br />';
    echo 'nouvelle carte distribuer : ';
    print_r($newDonne);
    echo '<br />';
    echo 'Main final : ';
    print_r($mainFinal);
    echo '<br />';
    echo 'toute les cartes tirées : ';
    echo count($carteTirer);
    echo '<br />';*/
//}
