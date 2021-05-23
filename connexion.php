<?php
session_start();

	include("basedonne.php");
	global $bdd;

	//Verifie que l'envoie du formulaire
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$nom = $_POST['nomc'];
			$motDePasse = $_POST['motDePassec']; 
			// Cherche dans le tableau visiteur l'entrée qui a un nom utilisateur similaire a celui transmit
			$requete = $bdd->prepare("SELECT * FROM visiteur WHERE nom_utilisateur = :nom");
			$requete->execute(['nom' => $nom]);
			$resultat = $requete->fetch(); 

			if ($resultat == true) {

				$mdp = $resultat['mdp_utilisateur'];

				if ($mdp == $motDePasse) {

					$_SESSION['nom'] = $resultat['nom_utilisateur'];
					header("Location: index.php");
					die();
				}
				
			}
			else {
				header("Location: connexion.php?pb=Aucune correspondance dans la base de donée");
				die();
			}	
			}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bodyConnexion">
		<form class="connexionForm" method="POST">
			<h1 class="h1connexion">CONNEXION</h1>
			<?php if (isset($_GET['pb'])) { ?>
				<div><p class="pb"><?php echo $_GET['pb']; ?></p></div>
			<?php } ?>
			<input class="inputConnexion" type="text" name="nomc" placeholder="Votre Nom" required>
			<input class="inputConnexion" type="password" name="motDePassec" placeholder="Votre Mot de passe" required>
			<input class="inputEnvoie" type="submit" name="Envoyer">
			<p>Tu n'as pas de compte ?</p> 
			<a class="button" href="inscription.php">Inscrit toi ici</a>
		</form>
</body>
</html>