

<?php
    include ('connectionBase.php');
?>


<!-- formulaire de verification de saisie des informations concernant l'envoye d'un mail -->
<?php


 #htmlspecialchars() permet d'eviter les injections sql
    $nom=htmlspecialchars($_GET['nom']);
    $sujet=htmlspecialchars($_GET['sujet']);
    $mail=htmlspecialchars($_GET['mail']);
    $message=htmlspecialchars($_GET['message']);  


    if (isset($_REQUEST ['envoyerMessage'])) {
        //verification que tous les champs sont complété
        if ($nom!="" and $mail!="" and $sujet!="" and $message!=""){
            //verification que c'est bien un email (evite qu'on change le code source sur la page html(balise email))
            if(filter_var($mail,FILTER_VALIDATE_EMAIL)){   
               // $req="INSERT INTO mail (objet,nom,message,dateHeure,ip,mail)VALUES('".$sujet."','".$nom."','".$message."','".$dateHeure."','".$ip."','".$mail."')";
              //  echo $req;
               // $result=$cnx->query($req);
                

                //envoye de l'email a la personne

               // $mail = 'florianboyer@live.fr'; // Déclaration de l'adresse de destination.
                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
                {
                    $passage_ligne = "\r\n";
                }
                else
                {
                    $passage_ligne = "\n";
                }

                                  
                $mailDestinataire= "florianboyer@live.fr";
                 
                //=====Création du header de l'e-mail.
                $header = "From: ".$nom."<".$mail.">".$passage_ligne;


                //=====Envoi de l'e-mail.
                mail($mailDestinataire,$sujet,$message,$header);
                //==========
                echo $mail ;
                echo "<br>";
                echo $header;
                echo "<br>";
                echo "mail envoyé";





                //Si probleme accés à la base 
   //             if($result===false){
               //     echo "Problème d'accés à la base";
               // }
            }
            else
                echo "Votre mail n'est pas valide";    
        }
        else
            echo "Vous devez complétez tous les champs";
        
    }








?>