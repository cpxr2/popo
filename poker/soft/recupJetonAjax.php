<?php
session_start();
require 'connexion.php';

$resultat = $bdd->prepare('SELECT jeton_jou FROM joueur WHERE id_jou=:id;');
$resultat->execute([':id'=>$_SESSION['id']]);
$res = $resultat->fetch();
$jeton = $res[0];

echo json_encode($jeton);