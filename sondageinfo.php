<?php  

function sondage_info($bdd){ 

		if (isset($_SESSION['nom'])) {
			
			$nom = $_SESSION['nom'];
			$requete_info = $bdd->prepare("SELECT * FROM sondage WHERE nom = :nom");
			$requete_info->execute(['nom' => $nom]);
			$donnes = $requete_info->fetch();

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