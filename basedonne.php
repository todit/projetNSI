<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', ''); // Connexion à la base de donnée
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage()); // Affiche en cas d'erreur
}