<?php
session_start();
/* Ouverture de la session qui permet de recuperer 
les donnees utilasteur de la base de donnée 
et les enregistre dans la session |Chatodit 29-04  */

	include("basedonne.php");
  include('verifia.php');
	global $bdd;
  
  $donnee_utilisateur = verifia($bdd);
  $theme = 'Star';
  
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$q1 = $_POST['q1'];
			$q2 = $_POST['q2'];
			$q3 = $_POST['q3'];
			$q4 = $_POST['q4'];
			$q5 = $_POST['q5'];
			$nom = $donnee_utilisateur['nom_utilisateur'];
			// Insertion des valeurs dans la base de donnée
			$requete = $bdd->prepare("INSERT INTO reponse(theme,nom,q1,q2,q3,q4,q5) VALUES(:theme,:nom,:q1,:q2,:q3,:q4,:q5)");
			$requete->execute([
			 'theme' => $theme, 
			 'nom' => $nom,
			 'q1' => $q1,
			 'q2' => $q2,
			 'q3' => $q3,
			 'q4' => $q4,
			 'q5' => $q5]);
			header("Location: index.php");
			die(); 
		} 

?>
<!DOCTYPE html>
<html>
<head>
		<title>Sondage Star</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php include 'header.php'; ?>
		<div id="container_question">
            <h1 class="h1_question">Theme : Star</h1>
   			<br>
  			<form id="quiz" method="POST">
  				<div id="question">
  					<h2 class="h2_question">Question N°1 :</h2>
  					<p>Choisissez une des quatres propositions</p>
  					<ul class="ul_question">
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q1" value="Messi" required>Messi
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q1" value="Ronaldo" required>Ronaldo
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q1" value="Neymar" required>Neymar
  						</li>
  							<li class="li_question">
  								<input class="question_input" type="radio" name="q1" value="Mbappe" required>Mbappe
  							</li>
  					</ul>

  				</div>
  				<div id="question">
  					<h2 class="h2_question">Question N°2 :</h2>
  					<p>Choisissez une des quatres propositions</p>
  					<ul class="ul_question">
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q2" value="Kim Kardashian" required>Kim Kardashian
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q2" value="Kylie Jenner" required>Kylie Jenner
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q2" value="Rihanna" required>Rihanna
  						</li>
  							<li class="li_question">
  								<input class="question_input" type="radio" name="q2" value="Ariana Grande" required>Ariana Grande
  							</li>
  					</ul>
  					
  				</div>
  				<div id="question">
  					<h2 class="h2_question">Question N°3 :</h2>
  					<p>Choisissez une des quatres propositions</p>
  					<ul class="ul_question">
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q3" value="David guetta " required>David guetta 
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q3" value="DJ Snake" required>DJ Snake
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q3" value="Michael Jackson" required>Michael Jackson
  						</li>
  							<li class="li_question">
  								<input class="question_input" type="radio" name="q3" value="Drake" required>Drake
  							</li>
  					</ul>
  					
  				</div>
  				<div id="question">
  					<h2 class="h2_question">Question N°4 :</h2>
  					<p>Choisissez une des quatres propositions</p>
  					<ul class="ul_question">
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q4" value="Donald Trump" required>Donald Trump
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q4" value="Joe Biden" required>Joe Biden
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q4" value="Hillary Clinton" required>Hillary Clinton
  						</li>
  							<li class="li_question">
  								<input class="question_input" type="radio" name="q4" value="Barack Obama" required>Barack Obama
  							</li>
  					</ul>
  					
  				</div>
  				<div id="question">
  					<h2 class="h2_question">Question N°5 :</h2>
  					<p>Choisissez une des quatres propositions</p>
  					<ul class="ul_question">
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q5" value="Ninho" required>Ninho
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q5" value="Booba" required>Booba
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="q5" value="Damso" required>Damso
  						</li>
  							<li class="li_question">
  								<input class="question_input" type="radio" name="q5" value="Orelsan" required><label>Orelsan</label> 
  							</li>
  					</ul>
  					
  				</div>
  				<input id="button_question" type="submit" name="Envoyer">
  			</form>
    	</div>
</body>
</html>