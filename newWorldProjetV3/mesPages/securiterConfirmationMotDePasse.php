<?php
    include ('connectionBase.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<!--         test et securité pour l'inscription d'une nouvelle personne -->

<?php

  #htmlspecialchars() permet d'eviter les injections sql
  $pseudo=htmlspecialchars($_GET['pseudo']);
  $mdpDepart=htmlspecialchars($_GET['mdpDepart']);
  $mdp1=htmlspecialchars($_GET['mdp1']);
  $mdp2=htmlspecialchars($_GET['mdp2']);
  $reponseSecrete=htmlspecialchars($_GET['reponseSecrete']);
   //on valide le compte apres le retour du mail de clique du mail
   $validationCompte = 1;
   //choix faits de la question
   $idQuestion=$_GET['questionSecrete'];
   echo "idQuestion vaut".$idQuestion;
   //verification que le psuedo existe.
     $req="SELECT * FROM user WHERE pseudo like\"$pseudo\"";
     $requetePseudo=$cnx->query($req);
     //echo $requetePseudo;
     echo "<br>";                     
     if($requetePseudo->num_rows==1){
      //verification que le mdp soit le bon
      $req= "SELECT * FROM user WHERE motDePasse =\"$mdpDepart\" and pseudo=\"$pseudo\"";
      //echo $req;
      $requeteMDPDepart= $cnx->query($req);
      if($requeteMDPDepart->num_rows==1){
      //verification que les mdp sont identique
         if($mdp1==$mdp2){
            //verifie la taille du mot de passe 8 carateres, qui est chiffre et lettre dedans maj et miniscule
            //taille mdp
            $longeurMdp=strlen($mdp1);
            if ($longeurMdp>7) {
               // On fait une boucle pour lire chaque lettre
               $securiteMDP=0;
               $securiteMdpMinuscule = 0;
               $securiteMdpMajuscule = 0;
               $securiteMdpChiffre = 0;
               for($i = 0; $i < $longeurMdp; $i++){
                  //echo $i;
                  // On sélectionne une à une chaque lettre
                  $lettre = $mdp1[$i];
                  //echo " securiteMDP: ".$securiteMDP. "  ->  ";
                  //echo $lettre ."<br/>";
                  //condition de l'existance d'une minuscule
                  if ($lettre>='a' && $lettre<='z'){
                     $securiteMdpMinuscule = 1;
                  }
                  //condition de l'existance d'une majuscule
                  if ($lettre>='A' && $lettre<='Z'){
                     $securiteMdpMajuscule =2;
                   }
                  //condition de l'existance d'un chiffre
                  if ($lettre>='0' && $lettre<='9'){
                     $securiteMdpChiffre=4;
                  }
               }//fin de la boucle test mdp
               //si une des condition n'est pas remplit
               //echo $securiteMdpChiffre;
               //echo $securiteMdpMinuscule;
               //echo $securiteMdpMajuscule."<br/>";
                  if (($securiteMdpChiffre + $securiteMdpMinuscule + $securiteMdpMajuscule)!=7) {
                     //echo $securiteMDP;
                     //echo "securiteMDP: ".$securiteMDP;
                     echo "<br/> Votre mot de passe semble ne pas etre sécurisé<br/>";
                  }
                  else{
                     //echo $securiteMDP;
                     echo "mot de passe valide";
                     //requete pour modfier l'enregistrement de la personne 
                     $reqInsererDonnee = "UPDATE user SET motDePasse = '".$mdp1."',validationCompte =$validationCompte,idQuestion = $idQuestion,reponseSecrete='".$reponseSecrete."' WHERE pseudo='".$pseudo."'";
                     echo $reqInsererDonnee;
                     $result=$cnx->query($reqInsererDonnee);
                     //Si probleme accés a la base 
                     if($result===false){
                         echo "Problème d'accés à la base";
                     }
                     else{
                        ?>
                        <a href="http://localhost/~fboyer/newWorldProjetV3/">Retour à l'accueil</a>
                        <script type="text/javascript">
                           alert("Bonjour,  <?php echo $pseudo ?>  votre mot de passe à été changé");
                        </script>
                        <?php
                     }
                  }
            } 
         }
         else{
            echo "Votre devez saisir le meme mot de passe";
        }
      }
      else{
         echo"Mauvais mot de passe";
      }
   }
   else{
      echo"Mauvais pseudo";
   }

?>

<a href="javascript:history.go(-1)">Retour</a>
</body>
</html>