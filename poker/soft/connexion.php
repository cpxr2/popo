<?php

$host = 'localhost';
$base = 'poker';
$idbdd = 'root';

try
{
$bdd = new PDO('mysql:host='. $host . ';dbname=' . $base . ';charset=utf8', $idbdd, '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
