<?php

//$main = [0=>23, 1=>38, 2=>45, 3=>11, 4=>26];


require 'connexion.php';

if(isset($_POST['data'])){
    
    $main = json_decode($_POST['data'], true);
    //$main = $_POST['data'];

$req = $bdd->prepare("SELECT * FROM valeur_carte WHERE id_val=:c0 OR id_val=:c1 OR id_val=:c2 OR id_val=:c3 OR id_val=:c4");
    $resultat = $req->execute([":c0" => $main['c0'],
                               ":c1" => $main['c1'],
                               ":c2" => $main['c2'],
                               ":c3" => $main['c3'],
                               ":c4" => $main['c4']
                              ]);
    
   // $req = $bdd->query("SELECT * FROM valeur_carte WHERE id_val=$main[0] OR id_val=$main[1] OR id_val=$main[2] OR id_val=$main[3] OR id_val=$main[4]");
    
$resultat = $req->fetchAll();
    
    echo json_encode($resultat);

}else{
    echo 'ça n\'a pas marché';
}