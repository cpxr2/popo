<?php
    try{
$bdd = new PDO('mysql:host=localhost;dbname=poker;charset=utf8', 'root', '');
}
catch (Exeption $e)
{
    die('Erreur : ' . $e->getMessage());
}

for($i=1; $i<54; $i++)
{
    $carte = "images/($i).png";
    $tirer = false;
    
    //$req = $bdd->query("INSERT INTO `jeu_carte`(`carte`, `tirer`) VALUES ('$carte', $tirer)");
   // $req->execute(array(':carte'=>$carte, ':tirer'=>$tirer));
 echo " ('$carte', false),<br />";
}
print_r($bdd->errorInfo());