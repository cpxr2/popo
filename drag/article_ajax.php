<?php

require 'connexion.php';
$position = null;
if(isset($_POST['position'])){
    $postion=$_POST['position'];
}
$contenu = json_decode($_POST['contenu']);

$requete = $bdd->prepare("INSERT INTO article(contenu_art, position_art) VALUES (:contenu, :position)");
$requete->execute([":contenu"=>$contenu,"position"=>$position]);

echo $contenu;