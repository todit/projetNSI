<?php
session_start();
/* Ouverture de la session qui permet de recuperer 
les donnees utilasteur de la base de donnée 
et les enregistre dans la session |Chatodit 29-04  */

  include("basedonne.php");
  include('verifia.php');
  global $bdd;
  
  $theme = 'Politique';
  // Selectionne toutes les entrées dans le tableau sondage ou le champ theme est egale à Politique
  $requete_question = $bdd->query('SELECT * FROM sondage WHERE theme=\'Politique\''); 

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $q1 = $_POST['q1'];
      $q2 = $_POST['q2'];
      $q3 = $_POST['q3'];
      $q4 = $_POST['q4'];
      $q5 = $_POST['q5'];
      $nom = $donnee_utilisateur['nom_utilisateur'];
      
      // Insertion des réponse utilisateur dans le tableau reponse
      $requete = $bdd->prepare("INSERT INTO reponse(theme,nom,q1,q2,q3,q4,q5) VALUES(:theme,:nom,:q1,:q2,:q3,:q4,:q5)");
      $requete->execute([
       'theme' => $theme, 
       'nom' => $nom,
       'q1' => $q1,
       'q2' => $q2,
       'q3' => $q3,
       'q4' => $q4,
       'q5' => $q5]);
      $requete = closeCursor();
      header("Location: index.php"); // Renvoie à la page d'acceuil
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
      <h1 class="h1_question">Theme : Politique</h1>
        <br>
      <?php 
      $x = 0;
      while ($donnees = $requete_question->fetch()) 
      {
      /* Boucle while qui recupere toute les valeur de requete question converti en array (comme un tableau) 
      et realise le code entre parenthese pour toutes les entrées */ 
      $x++;
      ?>     
  			<form id="quiz" method="POST">
  				<div id="question">
  					<h2 class="h2_question">Question N°<?php echo($x)?> :</h2>
  					<p>Choisissez une des quatres propositions</p>
  					<ul class="ul_question">
  						<li class="li_question">
  							<input class="question_input" type="radio" name="<?php echo($donnees['numero_question'])?>" value="<?php echo($donnees['choix_1'])?>" required><?php echo($donnees['choix_1'])?>
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="<?php echo($donnees['numero_question'])?>" value="<?php echo($donnees['choix_2'])?>" required><?php echo($donnees['choix_2'])?>
  						</li>
  						<li class="li_question">
  							<input class="question_input" type="radio" name="<?php echo($donnees['numero_question'])?>" value="<?php echo($donnees['choix_3'])?>" required><?php echo($donnees['choix_3'])?>
  						</li>
  							<li class="li_question">
  								<input class="question_input" type="radio" name="<?php echo($donnees['numero_question'])?>" value="<?php echo($donnees['choix_4'])?>" required><?php echo($donnees['choix_4'])?>
  							</li>
  					</ul>
            <?php
            }
            ?>
  				</div>
  				<input id="button_question" type="submit" name="Envoyer">
  			</form>
    	</div>
</body>
</html>