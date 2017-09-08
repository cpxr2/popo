<?php
require 'connexion.php';

$resultat = $bdd->query('SELECT jeton_util FROM utilisateur WHERE id_util=1;');
$res = $resultat->fetch();
$jeton = $res[0];

echo json_encode($jeton);