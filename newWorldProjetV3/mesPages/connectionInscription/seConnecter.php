<?php
    include ('../connectionBase.php');
	#htmlspecialchars() permet d'eviter les injections sql
	$pseudo=htmlspecialchars($_GET['pseudo']);
	$motDePasse=htmlspecialchars($_GET['mdp1']);

	//quand on clique sur le bouton valider 
	if(isset($_REQUEST['validerConnection'])){
	 	//verification que le pseudo existe
		$req="SELECT * FROM user WHERE pseudo =\"$pseudo\"";
		$requetePseudo=$cnx->query($req);

		if($requetePseudo->num_rows==1){
			//verification que le mot de passe soit correct
			$req2= "SELECT * FROM user WHERE pseudo =\"$pseudo\" AND motDePasse=\"$motDePasse\"";
			$requeteMotDePasse=$cnx->query($req2);
			if ($requeteMotDePasse->num_rows==1) {
				//conecter la personne à son profil
				echo"connection reussite";
				//créer une variable de session contenant les informations de la personnes
				//enregistrement du nom
				$txtNom = "SELECT nom,prenom,dateDeNaissance,numeroRue,adresse1,ville,codePostal,motDePasse FROM user WHERE pseudo =\"$pseudo\"";

				//obtention du resultat de la requete
				$resultat = $cnx->query($txtNom);
				//Méthode 1
				//obtention de la ligne(tableau)
				$tableauAssociatif = $resultat-> fetch_assoc();
				//recup du nom
				$sonNom=$tableauAssociatif['nom'];
				//recup du prenom
				$sonPrenom=$tableauAssociatif['prenom'];
				//recup de sa date de naissance
				$saDateDeNaissance=$tableauAssociatif['dateDeNaissance'];
				//recup du numero de la rue
				$sonNumeroDeRue=$tableauAssociatif['numeroRue'];
				//recup de l'adresse
				$sonAdresse=$tableauAssociatif['adresse'];
				//recup de la ville
				$saVille=$tableauAssociatif['ville'];
				//recup du code postal
				$sonCodePostal=$tableauAssociatif['codePostal'];

				/* //Methode 2
				$monUtilisateur=$resultat-> fetch_object();
				$sonNom=$monUtilisateur->nom;
				$sonPrenom=$monUtilisateur->prenom;
				*/

				/* //Methode 3
				$tabMonUtilisateur=$resultat-> fetch_array();
				$sonNom=$tabMonUtilisateur[1];
				$sonPrenom=$tabMonUtilisateur[0];
				*/

				//enregistrement du pseudo
				$_SESSION["pseudo"] = $pseudo;
				$_SESSION["nom"] =$sonNom ;
				$_SESSION["prenom"] =$sonPrenom ;
				$_SESSION["dateDeNaissance"] =$saDateDeNaissance ;
				$_SESSION["numeroRue"] =$sonNumeroDeRue ;
				$_SESSION["adresse"] =$sonAdresse ;
				$_SESSION["ville"] =$saVille ;
				$_SESSION["codePostal"] =$sonCodePostal ;
				$_SESSION["mdp"] =$mdp ;
				//Retour à la page d'accueil
				header('Location: http://localhost/~fboyer/newWorldProjetV3/');
				exit();//fin de l'instruction php
			}
			else{
				echo "Mauvais mot de passe";
			}
		}
		else{
			echo "Nous ne connaissons pas ce pseudo";
		}
	}

?>
   