<?php
session_start();
require 'connexion.php';

$resultat = $bdd->prepare('SELECT jeton_util FROM utilisateur WHERE id_util=:id;');
$resultat->execute([':id'=>$_SESSION['id']]);
$res = $resultat->fetch();
$jeton = $res[0];

echo json_encode($jeton);