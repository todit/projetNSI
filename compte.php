<?php
session_start(); 
/* Ouverture de la session qui permet de recuperer 
les donnees utilasteur de la base de donnée 
et les enregistre dans la session |Chatodit 29-04  */

	include("basedonne.php"); // 
	include('sondageinfo.php');
	include('verifia.php');
	global $bdd;

	$donnee_utilisateur_visiteur = verifia($bdd);
	$nom = $donnee_utilisateur_visiteur['nom_utilisateur']; // Stock le nom d'utilisateur dans la variable
	$requete_info = $bdd->prepare('SELECT * FROM reponse WHERE nom = :nom'); 
	$requete_info->execute(['nom' => $nom]); // selectionne toute les entree de la table reponse qui ont un egale au nom de l'utilisateur

?>

<!DOCTYPE html>
<html>
<head>
	<title>Votre compte</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include "header.php"?>
	<h1>Bienvenu <?php echo $donnee_utilisateur_visiteur['nom_utilisateur']; ?>, sur votre compte</h1>
	<div class="container">
		<div class="themeCompte">
			<h2>Information relative à votre compte</h2>
			<p class="donnee_utilisateur">Nom: <?php echo $donnee_utilisateur_visiteur['nom_utilisateur']; ?></p>
			<p class="donnee_utilisateur">Date de creation: <?php echo $donnee_utilisateur_visiteur['date']; ?></p>
			<p class="donnee_utilisateur">Mot de passe: <?php echo $donnee_utilisateur_visiteur['mdp_utilisateur']; ?></p>
			<h3 class="donnee_utilisateur">Vos sondage</h3>
			<?php while ($donnees = $requete_info->fetch()) 
			/* Boucle while qui recupere toute les valeur de requete info converti en array (comme un tableau) 
			et realise le code entre parenthese pour toutes les entrées */
			{
			  ?>
			<h4 class="donnee_utilisateur">Theme: <?php echo $donnees['theme']; ?></h4>
			<p class="donnee_utilisateur">q1: <?php echo $donnees['q1']; ?></p>
			<p class="donnee_utilisateur">q2: <?php echo $donnees['q2']; ?></p>
			<p class="donnee_utilisateur">q3: <?php echo $donnees['q3']; ?></p>
			<p class="donnee_utilisateur">q4: <?php echo $donnees['q4']; ?></p>
			<p class="donnee_utilisateur">q5: <?php echo $donnees['q5']; ?></p>
			<?php  
			}
			?>	
		</div>
	</div>
	

</body>
</html>