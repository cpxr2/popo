<?php
session_start();
require 'connexion.php';

$resultat = $bdd->prepare('SELECT jeton_user FROM users WHERE id_user=:id;');
$resultat->execute([':id'=>$_SESSION['id']]);
$res = $resultat->fetch();
$jeton = $res[0];
$resultat->closeCursor();
echo json_encode($jeton);