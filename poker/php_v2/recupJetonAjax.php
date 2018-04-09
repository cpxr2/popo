<?php
session_start();
require 'backOffice/connexion.php';

if($_SESSION['partieTemp']){

    $res = $bdd->prepare('SELECT jeton_jt FROM joueur_temporaire WHERE id_admin = :id AND date_jt = :date');
    $res->bindParam(':id', $_SESSION['id_admin']);
    $res->bindParam(':date', $_SESSION['date']);
    $res->execute();
    $resu = $res->fetch();
    $jeton = $resu[0];

}else{

$resultat = $bdd->prepare('SELECT jeton_jou FROM joueur WHERE id_jou=:id;');
$resultat->execute([':id'=>$_SESSION['id']]);
$res = $resultat->fetch();
$jeton = $res[0];
}

$reqParam = $bdd->query('SELECT * FROM setting WHERE id=1');
$resParam = $reqParam->fetch();

$data = $resParam;
$data['nbJeton']= $jeton;


echo json_encode($data);
