<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
salut <br>
<?php

	// function generer_mot_de_passe($nb_caractere = 12)
	// {
	//         $mot_de_passe = "";
	       
	//         $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789+@!$%?&";
	//         $longeur_chaine = strlen($chaine);
	       
	//         for($i = 1; $i <= $nb_caractere; $i++)
	//         {
	//             $place_aleatoire = mt_rand(0,($longeur_chaine-1));
	//             $mot_de_passe .= $chaine[$place_aleatoire];
	//         }

	//         return $mot_de_passe; 
	//         echo "bonjour   :  ";
	//         echo $mot_de_passe;

	// }
	// generer_mot_de_passe();

			$nb_caractere = 8;
		    $mot_de_passe = "";
	        $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789+@!$%?&";
	        $longeur_chaine = strlen($chaine);
	        for($i = 1; $i <= $nb_caractere; $i++)
	        {
	            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
	            $mot_de_passe .= $chaine[$place_aleatoire];
	        }
	        echo $mot_de_passe;
?>

</body>
</html>

