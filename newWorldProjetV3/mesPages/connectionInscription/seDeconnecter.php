<?php
    include ('../connectionBase.php');
?>

<?php

//pour rafraichir la page
$delai=0.5; 
$url='http://localhost/~fboyer/newWorldProjetV3/';
	if (isset($_SESSION['pseudo'])) {
		unset($_SESSION['pseudo'] 
			and $_SESSION['nom'] 
			and $_SESSION['prenom'] 
			and $_SESSION['dateDeNaissance'] 
			and $_SESSION['mdp']);
		header("Refresh: $delai; url=$url");
		echo "Vous avez été déconnecté avec succés";
	}




	//quand on clique sur le bouton valider 
	// if(isset($_REQUEST['validerDeconnection'])){
	// 	session_destroy();
	// 	//redicrection de la page
	// 	header("Refresh: $delai; url=$url");
	// }
?>