<!DOCTYPE html>
<html lang="fr">
<head>

	<title>Confirmation Inscription</title>
<!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */
        /* Necessary for full page carousel*/
        
        html,
        body,
        .view {
            height: 100%;
        }
        /* Navigation*/
        
        .navbar {
            background-color: transparent;
        }
        
        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }
        
        .top-nav-collapse {
            background-color: #2b3f66;
        }
        
        footer.page-footer {
            background-color: #2b3f66;
            margin-top: 0;
        }
        
        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #2b3f66;
            }
        }
        /* Carousel*/
        
        .carousel,
        .carousel-item,
        .active {
            height: 100%;
        }
        
        .carousel-inner {
            height: 100%;
        }
        /*Caption*/
        
        .flex-center {
            color: #fff;
        }
        
        @media (min-width: 776px) {
            .carousel .view ul li {
                display: inline;
            }
            .carousel .view .full-bg-img ul li .flex-item {
                margin-bottom: 1.5rem;
            }
        }
        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }
        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }
    </style>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/enhanced-modals.min.css" rel="stylesheet">
    <link href="../css/enhanced-modals.css" rel="stylesheet">
<!-- Mon css -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
</head>

<body>
	<?php include ('bandeauMenu.php');?>
		<h3>Modifier votre mot de passe:</h3>
		<!-- Tab panels -->
        <div class="tab-content inscription">
            <!--connection-->
            <form method="GET" action="securiterConfirmationMotDePasse.php">
                <!--Body-->
                <div class="modal-body mb-1">
                    <div class="md-form form-sm">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="text" id="form22" name="pseudo" class="form-control" required  autofocus placeholder="Votre pseudo">
                        <label for="form22"></label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="password" id="form23" name="mdpDepart" class="form-control" required  autofocus placeholder="Votre mot de passe">
                        <label for="form23"></label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" id="form23" name="mdp1" class="form-control" required placeholder="Nouveau mot de passe (mininmun 8 caracteres, majuscule minuscule et chiffre obligatoire)">
                        <label for="form23"></label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" id="form23" name="mdp2" class="form-control" required placeholder="Confirmer votre mot de passe">
                        <label for="form23"></label>
                    </div>
                    <div class="md-form form-sm">
                        <p>Choissisez une des questions</p>
                        <select name="questionSecrete">
		                    <?php
			                    $req=("SELECT idQuestion,questionSecrete FROM mdpQuestion") or die ("requète non executé");
			                    $requeteQuestionSecrete= $cnx->query($req);
			                    //requete pour recuperer l'id de la question
			                    $reqIdQuestion= ("SELECT idQuestion FROM mdpQuestion");
			                    //echo $reqIdQuestion;
			                    $requeteIdQuestion= $cnx->query($reqIdQuestion);
								if (! $requeteQuestionSecrete) { echo "Erreur requete"; exit;} ; 
			                    while ($ligne=mysqli_fetch_array($requeteQuestionSecrete))
								{
							?>
							<option value="<?php echo $ligne['idQuestion']?>">
								<?php 
									echo ''.$ligne['questionSecrete'].'';
								?> 
							</option>
							<?php
								}
							?>
						</select>
						<label for="form23"></label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" id="form25" name="reponseSecrete" class="form-control" required placeholder="Votre réponse">
                        <label for="form25"></label>
                    </div>  



                    <div class="text-center mt-2">
                        <button class="btn btn-info" type="submit" name="validerConnection">Se connecter<i class="fa fa-sign-in ml-1"></i></button>
                        <a href="http://localhost/~fboyer/newWorldProjetV3/">Retour à l'accueil</a>
                    </div>
                </div>
            </form>
            <!--/.connection-->
        </div>
	<?php include ('bandeauFin.php');?>

</body>
</html>