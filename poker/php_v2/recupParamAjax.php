<?php
require 'backOffice/connexion.php';

$req = $bdd->query('SELECT valeur_10 FROM setting WHERE id=1');
$res = $req->fetch();

echo json_encode($res);

 ?>
