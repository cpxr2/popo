<?php
require 'connexion.php';
require 'fonction.php';

// Variable setter pour le teste

$_POST["new"] = 3;
$_POST["carteTirer"] = [0=>2, 1=>44];
$_POST["mainFinal"] = [0=>23, 1=>42];




if(isset($_POST['new'])){
    
    //vrai variable

    $newDonne=[]; // tableau des cartes à renvoyer en ajax
    $nbCartes = $_POST['new']; //le nombre de nouvelles cartes à tirer
    //$carteTirer = json_decode($_POST['carteTirer']); //tableau des cartes déjà tirées
    //$mainFinal = json_decode($_POST['mainFinal']);
    
    
    //variable de teste
    
    $mainFinal = $_POST['mainFinal'];
    $carteTirer = $_POST['carteTirer']; //tableau des cartes déjà tirées


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

            for($j=0; $j<5; $j++)
            {

                if(!array_search($carte, $carteTirer))//Si elle est deja tirer on passe en TRUE et on retire
                {
                    $dejaTirer = false;                    
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

    $requete = $bdd->prepare('SELECT * FROM valeur_carte WHERE id_val=:id0 OR id_val=:id1 OR id_val=:id2 OR id_val=:id3 OR id_val=:id4');
    $requete->execute([
        ':id0'=>$mainFinal[0],
        ':id1'=>$mainFinal[1],
        ':id2'=>$mainFinal[2],
        ':id3'=>$mainFinal[3],
        ':id4'=>$mainFinal[4],
    ]);

    $resultat = $requete->fetchAll();
  print_r($resultat);
        
    /******************************************
     *   PLACE DES FONCTIONS DE VERIF          *
     ******************************************/
    
   verfiMain($resultat);

    /*echo 'retour de la requete : ';
    print_r($resultat);
    $testObjet = $resultat[0];
    echo $testObjet['couleur_val'];*/


    $retour = json_encode($newDonne);
    //$retour = json_encode($carteTirer);

    echo $retour;
    //echo json_encode($carteTirer);

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
}