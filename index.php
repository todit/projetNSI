<?php
session_start(); 
/* Ouverture de la session qui permet de recuperer 
les donnees utilasteur de la base de donnée 
et les enregistre dans la session |Chatodit 29-04  */

	include("basedonne.php"); // Connexion à la base de donnée 
	include('verifia.php');  // Appelle de la fonction qui permet de verifer si l'on est connecté 
	global $bdd;

	$donnee_utilisateur = verifia($bdd); // Variable qui stock toute les champzs de la base relative à l'utilisateur

?>
<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include "header.php"?> <!-- Inclu le menu Header dans la page  -->
	<h1>Bienvenu <?php echo $donnee_utilisateur['nom_utilisateur']; ?>, sur tcr sondage </h1>
	<div class="container">
		<div class="theme">
		<h2>Theme : Personnalité</h2>
		<p>Découvrez notre sondage sur les personalité<br>
		les plus connus du monde.</p>
		<a class="button" href="sdstar.php">Cliquez-ici</a>
	</div>
	<div class="theme">
		<h2>Theme : Culinaire</h2>
		<p>Découvrez notre sondage sur les spécialité culinaire<br>
		les plus connus du monde.</p>
		<a class="button" href="sdculinaire.php">Cliquez-ici</a>
	</div>
	<div class="theme">
		<h2>Theme : Politique</h2>
		<p>Découvrez notre sondage sur la Politique<br>
		les plus connus du monde.</p>
		<a class="button" href="sdcinema.php">Cliquez-ici</a>	
	</div>
</div>
	
</body>
</html>