<?php
session_start();

	include("basedonne.php");
	global $bdd; 

	//Verifie que l'envoie du formulaire
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$nom = $_POST['nom'];
			$motDePasse = $_POST['motDePasse'];
			// Insertion des valeurs dans la base de donnée
			$requete = $bdd->prepare("INSERT INTO visiteur(nom_utilisateur,mdp_utilisateur) VALUES(:nom,:mdp)");
			$requete->execute([
			 'nom' => $nom, 
			 'mdp' => $motDePasse]);
			header("Location: connexion.php");
			die(); 
		}	


?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bodyConnexion">
		
		<form class="connexionForm" method="POST">
			<h1 class="h1connexion">INSCRIPTION</h1>
			<input class="inputConnexion" type="text" name="nom" id="nom" placeholder="Votre Nom" required>
			<input class="inputConnexion" type="password" name="motDePasse" id="motDePasse" placeholder="Votre Mot de passe" required>
			<input class="inputEnvoie" type="submit" name="envoyer" id="envoyer">
			<p>Deja un compte ?</p> 
			<a class="button" href="connexion.php">Connecte toi ici</a>
		</form>
</body>
</html>