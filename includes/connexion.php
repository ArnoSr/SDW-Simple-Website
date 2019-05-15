<?php
// Paramètres de connexion
$host = 'localhost';
$dbname = 'simple-website';
$username = 'root';
$password = 'root'; // MacOs : 'root' | Windows : ''

try
{
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $username, $password);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}