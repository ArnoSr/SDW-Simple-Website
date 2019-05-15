<?php

require 'includes/connexion.php';


/* Récupérations des données infos */
$stmt = $bdd->prepare("SELECT firstname, lastname FROM infos WHERE id = 1");
$stmt->execute();
$row = $stmt->fetch();

echo "Nom : " . $row['firstname'] . "<br/>";
echo "Prénom : " . $row['lastname'];