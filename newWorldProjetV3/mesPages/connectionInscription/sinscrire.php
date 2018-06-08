<!DOCTYPE html>
<html lang="fr">
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


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>New World</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/enhanced-modals.min.css" rel="stylesheet">
    <link href="../../css/enhanced-modals.css" rel="stylesheet">
<!-- Mon css -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">

    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">

</head>

<body class="inscription">
   <?php include ('../../mesPages/bandeauMenu.php');?>
        <h2>Se connecter</h2>

            <!-- Tab panels -->
            <div class="tab-content">
                <!--Panel 7-->
                <form method="GET" action="mesPages/connectionInscription/seConnecter.php">
                <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                    <!--Body-->
                    <div class="modal-body mb-1">
                        <div class="md-form form-sm">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="text" id="form22" name="pseudo" class="form-control" required="" placeholder="Votre pseudo">
                            <label for="form22"></label>
                        </div>

                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="form23" name="mdp1" class="form-control" required="" placeholder="Votre mot de passe">
                            <label for="form23"></label>
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-info" type="submit" name="validerConnection">Se connecter<i class="fa fa-sign-in ml-1"></i></button>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer display-footer">
                        <div class="options text-center text-md-right mt-1">
                            <p>Pas encore menbre? <a href="#panel8" class="blue-text">S'inscrire</a></p>
                            <p>Mot de passe oublié? <a href="#" class="blue-text">Mot de Passe</a></p>
                        </div>
                        <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal" href="#"> Retour à l'accueil </button>
                    </div>
                 </div>
                 </form>

                <!--/.Panel 7-->










                <!--Panel 8-->
                <form method="GET" action="mesPages/connectionInscription/inscription.php">
                <div class="tab-pane fade" id="panel8" role="tabpanel">

                    <!--Body-->
                    <div class="modal-body">
                        <div class="md-form form-sm">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form24" name="pseudo" class="form-control" placeholder="Votre pseudo" required autofocus>
                            <label for="form24"></label>

                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form24" name="nom" class="form-control" placeholder="Votre Nom" required autofocus>
                            <label for="form24"></label>

                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form24" name="prenom" class="form-control" required="" placeholder="Votre Prénom">
                            <label for="form24"> </label>
                        </div>
                         <div class="md-form form-sm">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="form24" name="dateDeNaissance" class="form-control" required="" placeholder="Votre date de naissance">
                            <label for="form24"> </label>
                        </div>

                        <div class="md-form form-sm">
                            <i class="fa fa-firefox prefix"></i>
                            <input type="text" id="form24" name="mail1" class="form-control" required="" placeholder="Votre mail">
                            <label for="form24"> </label>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-firefox prefix"></i>
                            <input type="text" id="form24" name="mail2" class="form-control" required="" placeholder="Retaper votre mail">
                            <label for="form24"> </label>
                        </div>                    
                        <div class="md-form form-sm">
                            <i class="fa fa-map-marker prefix"></i>
                            <input type="text"  name="adresse" id="idAdresse" datalist="dataListAdresse" class="form-control" required="" placeholder="Votre adresse" class="ui-autocomplete-input" autocomplete="off">
                            <datalist id="dataListAdresse">
                                <option value="jsonReponse.features[0].properties.street"></option>
                                <option value="jsonReponse.features[0].properties.postcode"></option>
                                <option value="jsonReponse.features[0].properties.name"></option>
                            </datalist>
                            <label for="form24"> </label>
                        </div>
                            
<script type="text/javascript">

//auto complément de l'adresse ville et code postal
$("#idAdresse").autocomplete({
  source: function (request, response) {
    $.ajax({
        url: "https://api-adresse.data.gouv.fr/search/?limit=5",
        data: { q: request.term },
        dataType: "json",
        success: function (data) {
            response($.map(data.features, function (item) {
                return { label: item.properties.label, postcode: item.properties.postcode,city: item.properties.city, value: item.properties.label, street: item.properties.street, name: item.properties.name, latitude: item.geometry.coordinates[1],longitude: item.geometry.coordinates[0]};
            }));
        }
    });
  },
  select: function(event, ui) {
    $('#idCP').val(ui.item.postcode);
    $('#idVille').val(ui.item.city);
    if(ui.item.street)
    $('#idRue').val(ui.item.street);
    else
    $('#idRue').val(ui.item.name);
    $("#idLatitude").val(ui.item.latitude);
    $("#idLongitude").val(ui.item.longitude);
  }
});
</script>

                        </div> 
                        <div class="md-form form-sm">
                            <i class="fa fa-building-o prefix"></i>
                            <input type="text" id="form24" name="rue" class="form-control" required="" placeholder="Votre rue">
                            <label for="form24"> </label>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-globe prefix"></i>
                            <input type="text" id="form24" name="codePostal" class="form-control" required="" placeholder="Votre code postal">
                            <label for="form24"> </label>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-globe prefix"></i>
                            <input type="text" id="form24" name="ville" class="form-control" required="" placeholder="Votre ville">
                            <label for="form24"> </label>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-phone prefix"></i>
                            <input type="text" id="form24" name="telephone" class="form-control" required="" placeholder="Votre numero de télephone">
                            <label for="form24"> </label>
                        </div>                                                                                  
                        <div class="text-center form-sm mt-2">
                            <button class="btn btn-info" type="submit" name="validerInscription"> S'inscrire <i class="fa fa-sign-in ml-1"></i></button>
                        </div>

                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <div class="options text-right">
                            <p class="pt-1">Vous avez déjà un compte? <a href="#panel7" class="blue-text"> Se connecter</a></p>
                        </div>
                        <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
                </form>
                <!--/.Panel 8-->
            </div>
        </div>
        <?php include ('../../mesPages/bandeauFin.php');?>
    </body>
</html>


