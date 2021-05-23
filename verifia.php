<?php 

	function verifia($bdd){ 

		if (isset($_SESSION['nom'])) { // Verifie si le nom est dans la session 
			
			$nom = $_SESSION['nom'];
			$requete = $bdd->prepare("SELECT * FROM visiteur WHERE nom_utilisateur = :nom"); // Recherche du nom dans la base
			$requete->execute(['nom' => $nom]);
			$donnes = $requete->fetch();

			if ($donnes['nom_utilisateur'] == $nom) {
				 
				 $donne_utilisateur = $donnes;
				 return $donne_utilisateur;
			}
		}
		else {
			header("Location: connexion.php");
			die();	
			}
		}	


?>