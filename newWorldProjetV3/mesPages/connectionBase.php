<?php
session_start();

	$user ="root";
	$pwd ="passf203";
	$serveur ="localhost";
	$base = "nw";

	// connection à la base
	if (!($cnx = mysqli_connect($serveur, $user, $pwd, $base))) {
		echo "connection impossible ".$cnx->connect_error;
	}
		
	$cnx->query("SET NAMES utf8");


	//echo "Connexion réussie à la base<br>";

function testConnection() {
	
	$result = $cnx->query("show tables;");
	if($result=== false or $result->num_rows<1)
		{ echo "base vide !!! ";}
	else {
		while ($ligne = $result->fetch_assoc()) {
			foreach($ligne as $k=>$v)
				echo $k." => ".$v;
		}
	}
	$result->close();
}	
	
?>

