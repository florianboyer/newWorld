<?php
    include ('../connectionBase.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<!--         test et securité pour l'inscription d'une nouvelle personne -->

<?php

  $url="formulaireInscription.php?".$_SERVER['argv'][0];
    echo $url;

  #htmlspecialchars() permet d'eviter les injections sql
  $pseudo=htmlspecialchars($_GET['pseudo']);
  $nom=htmlspecialchars($_GET['nom']);
  $prenom=htmlspecialchars($_GET['prenom']);
  $mail1=htmlspecialchars($_GET['mail1']);
  $mail2=htmlspecialchars($_GET['mail2']);
  $numeroRue=htmlspecialchars($_GET['numeroRue']);
  $rue=htmlspecialchars($_GET['rue']);
  $codePostal=htmlspecialchars($_GET['codePostal']);
  $ville=htmlspecialchars($_GET['ville']);
  $telephone=htmlspecialchars($_GET['telephone']);
  $dateDeNaissance=htmlspecialchars($_GET['dateDeNaissance']);
//on ne valide pas le comprte au debut cela sera faits quand il cliquera sur le lien apres le retour du mail
  $validationCompte = 0;
  


    if(isset($_REQUEST['validerInscription'])){

        //verification des variables suivantes soit des lettres

        // verification usage de lettres
        $lettresSaisies=array($prenom,$nom);
        
        function verifierUsageDeLettre($lettreVerification){
            foreach ($lettreVerification as $testlettre) {
                if(!ctype_alpha($testlettre)){
                    //verification que le pseudo n'existe pas deja                          
                    return false;                               
                }
            }
            return true;
        }
                    

        if(verifierUsageDeLettre($lettresSaisies)){
            //verification que le psuedo n'existe pas deja 
            $req="select * from user where pseudo like\"%$pseudo%\"";
            $requetePseudo=$cnx->query($req);
            // echo $requetePseudo;
            // echo "<br>";                     
            if($requetePseudo->num_rows<1){
                //verification email soit pas deja dans la base
                $req= "select * from user where mail like\"%$mail1%\"";
                //echo $req;
                $requeteMail= $cnx->query($req);
                if($requeteMail->num_rows<1){
                //verification email identique
                    if($mail1==$mail2){
                        //verification que c'est bien un email (evite quon change le code source sur la page html(balise email))
                        if(filter_var($mail1,FILTER_VALIDATE_EMAIL)){
                                //verification que le numero soit que des chiffres
                                if (filter_var($telephone,FILTER_VALIDATE_INT)!==true) {
                                    //verification taille numero de tel 
                                    if (strlen($telephone)==10){
                                        //verification que le cp soit que des chiffres
                                        if (filter_var($codePostal,FILTER_VALIDATE_INT)!==true) {
                                            //verfication que me cp soit de 5chiffres
                                            if (strlen($codePostal)==5){
                                            // generation d'un mdp aleatoire
                                            $nb_caractere = 8;
                                            $mot_de_passe = "";
                                            $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789+@!$%?&";
                                            $longeur_chaine = strlen($chaine);
                                            for($i = 1; $i <= $nb_caractere; $i++)
                                            {
                                              $place_aleatoire = mt_rand(0,($longeur_chaine-1));
                                              $mot_de_passe .= $chaine[$place_aleatoire];
                                            }
                                              //generation d'un id 
                                              $txtReqIdMax = "SELECT Max(idUser)+1 as sonNumero FROM user";
                                              $reqIdMax = $cnx->query($txtReqIdMax);
                                              //echo $reqIdMax;
                                              $ligne=mysqli_fetch_object($reqIdMax);
                                              $idMax=$ligne->sonNumero;
                                                //requete pour enregistrer la personne dans la base
                                                $reqInsererDonnee="INSERT INTO user (idUser,pseudo,prenom,nom,mail,numeroTelephone,numeroRue,adresse1,ville,codePostal,motDePasse,dateDeNaissance,validationCompte)VALUES(".$idMax.",'".$pseudo."','".$prenom."','".$nom."','".$mail1."','".$telephone."','".$numeroRue."','".$rue."','".$ville."','".$codePostal."','".$mot_de_passe."','".$dateDeNaissance."',".$validationCompte.")";
                                                echo $reqInsererDonnee;
                                                $result=$cnx->query($reqInsererDonnee);
                                                
                                                //si il a pu s'sincrire on lui envoye un mail avec son mot de passe
                                                 $to      = $mail1;
                                                 $subject = 'Inscription NewWord';
                                                 $message = '
                                                 <!DOCTYPE html>
                                                <html>
                                                <head>
                                                  <title>Inscription nw</title>
                                                  <meta charset="utf-8">
                                                </head>
                                                <body style="color:black font-size:14px;">
                                                 Bonjour  '.$nom.'  '.$prenom.' ! <br/>
                                                        Nous sommes fière de vous compter parmis nous. Voici vos identifiants pour vous connecter, nous vous conseillions de changer votre mot de passe. Vous pouvez le faire en accedants à votre profils.<br/>
                                                  Vos identidiants sont:<br/>
                                                      pseudo: ' .$pseudo.
                                                      '<br/>mot de passe: '.$mot_de_passe.
                                                  '<br/>Pour finaliser votre inscription merci de cliquer sur ce lien <a href="http://127.0.0.2/~fboyer/newWorldProjetV3/mesPages/confirmationInscription.php">Confirmation d\'Inscription<a/>
                                                  <br/>Nous vous remercions de votre inscription
                                                      NewWord ensemble pour des produits locaux     
                                                  </body>
                                                  </html>';
                                                  $headers[] = 'MIME-Version: 1.0';
                                                  $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                                                 // En-têtes additionnels
                                                 $headers[] = 'From: newword <newword@nw.com>';

                                                 // Envoi
                                                 mail($to, $subject, $message, implode("\r\n", $headers));
                                                 echo "mail envoyé;";
                                                //Si probleme accés a la base 
                                                if($result===false){
                                                    echo "Problème d'accés à la base";
                                                }
                                                else {
                                                    ?>
                                                    <script type="text/javascript">
                                                        alert("Bonjour,  <?php echo $pseudo ?>  vous avez été inscrit avec succès");
                                                    </script>
                                                    <?php
                                                }
                                            }
                                            else{

                                                echo "Votre code postal doit comporter 5 chiffres";
                                            }
                                        }
                                        else{
                                            echo"Votre code postal doit seulement être composé de chiffres";
                                        }
                                    }
                                    else{
                                        echo"Votre numero de telephone doit etre composé de 10 chiffres";
                                    }
                                }
                                else{
                                    echo "Vous n'avez pas entré un numero de télephone valide";
                                }
                            }                               
                            else{
                                echo "Votre email n'est pas valide";
                            }
                        }
                        else{
                            echo "Email different";
                        }
                    }
                    else{
                        echo "Qu'elle qu'un est deja inscrit sur cet email";
                    }
                }
                else{
                    echo"Ce pseudo exite deja";
                }
            }
            else{
                echo "Vous devais rentrez seulement des lettres (nom, prénoms et ville)";//nom prenoms ville
            }

        }
?>

<a href="<?=$url?>">Retour</a>
</body>
</html>