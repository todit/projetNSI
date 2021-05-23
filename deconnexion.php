<?php 

session_start();
/* Ouverture de la session qui permet de recuperer 
les donnees utilasteur de la base de donnée 
et les enregistre dans la session |Chatodit 29-04  */

	include("basedonne.php");
	include('verifia.php');
	global $bdd;

	$donnee_utilisateur = verifia($bdd);

	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['nom'])) { // Verifie si la session est active
	
	unset($_SESSION['nom']); // deconnecte la session
	header("Location: connexion.php");
	die();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Déconnexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include "header.php"?>
	<h1>Deconnexion</h1>
	<form class="container" method="POST">
		<div class="theme">
		<h2>Deconnecté vous juste ici</h2>
		<p>Nous esperons vous revoir bientot <?php echo $donnee_utilisateur['nom_utilisateur']; ?><br></p>
		<input class="button" type="submit" name="Deconnexion">
		</form>
	</div>

</body>
</html>