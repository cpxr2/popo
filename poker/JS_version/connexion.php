<?php
try
{
        $bdd = new PDO('mysql:host=localhost;dbname=poker;charset=utf8', 'root', '');
}
catch (Exeption $e)
{
    die('Erreur : ' . $e->getMessage());
}