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

<body>
    <?php include ('../../mesPages/bandeauMenu.php');?>
    <!--formulaire d'inscription-->
    <form method="GET" id="controleInscription" name="controleInscription" action="inscription.php">
        <div class="tab-pane inscription">
            <h2>S'inscrire</h2><br>
            <!--Body-->
            <div class="md-form form-sm">
                <i class="fa fa-user prefix"></i>
                <input type="text" id="form25" name="pseudo" class="form-control" placeholder="Votre pseudo" value="<?php if (isset($_GET['pseudo'])){echo $_GET['pseudo'];} ?>" autofocus>
                <label for="form25"></label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-user prefix"></i>
                <input type="text" id="form24" name="nom" class="form-control" placeholder="Votre Nom" value="<?php if (isset($_GET['nom'])){echo $_GET['nom'];} ?>">
                <label for="form24"></label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-user prefix"></i>
                <input type="text" id="form24" name="prenom" class="form-control" placeholder="Votre Prénom" value="<?php if (isset($_GET['prenom'])){echo $_GET['prenom'];} ?>">
                <label for="form24"> </label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-user prefix"></i>
                <input type="date" id="form24" name="dateDeNaissance" class="form-control" placeholder="Votre date de naissance" value="<?php if (isset($_GET['dateDeNaissance'])){echo $_GET['dateDeNaissance'];} ?>">
                <label for="form24"> </label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-firefox prefix"></i>
                <input type="mail" id="form24" name="mail1" class="form-control" placeholder="Votre mail" value="<?php if (isset($_GET['mail1'])){echo $_GET['mail1'];} ?>">
                <label for="form24"> </label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-firefox prefix"></i>
                <input type="mail" id="form24" name="mail2" class="form-control" placeholder="Retaper votre mail" value="<?php if (isset($_GET['mail2'])){echo $_GET['mail2'];} ?>">
                <label for="form24"> </label>
            </div>                    
            <div class="md-form form-sm">
                <i class="fa fa-map-marker prefix"></i>
                <input type="text"  name="adresse" id="idAdresse"   value="<?php if (isset($_GET['adresse'])){echo $_GET['adresse'];} ?>">  
                <label for="form24"> </label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-building-o prefix"></i>
                <input type="text" name="numeroRue" id="idNumero" readonly  value="<?php if (isset($_GET['numeroRue'])){echo $_GET['numeroRue'];} ?>">
                <label for="form24"> </label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-building-o prefix"></i>
                <input type="text" name="rue" id="idRue" readonly  value="<?php if (isset($_GET['rue'])){echo $_GET['rue'];} ?>">
                <label for="form24"> </label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-globe prefix"></i>
                <input type="text" id="idCP" name="codePostal" readonly  value="<?php if (isset($_GET['codePostal'])){echo $_GET['codePostal'];} ?>">
                <label for="form24"> </label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-globe prefix"></i>
                <input type="text" id="idVille" name="ville" readonly  value="<?php if (isset($_GET['ville'])){echo $_GET['ville'];} ?>">
                <label for="form24"> </label>
            </div>
            <div class="md-form form-sm">
                <i class="fa fa-phone prefix"></i>
                <input type="tel" id="form24" name="telephone" class="form-control" value="<?php if (isset($_GET['telephone'])){echo $_GET['telephone'];} ?>">
                <label for="form24"> </label>
            </div>
            <div class="text-center form-sm mt-2">
                <button class="btn btn-info" type="submit" id="valider" name="validerInscription"> S'inscrire <i class="fa fa-sign-in ml-1"></i></button>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <div class="options text-right"> <br>
                    <p class="pt-1">Vous avez déjà un compte?<a href="formulaireConnection.php" class="blue-text"> Se connecter</a></p>
                </div>
                <a href="http://localhost/~fboyer/newWorldProjetV3/">Retour à l'accueil</a>
            </div>
        </div>
    </form>
    <!--/.formulaire d'inscription-->
    <?php include ('../../mesPages/bandeauFin.php');?>

    <!-- Bibliotheque de Jquerry -->
    <script src="test.js"></script>



    </body>
</html>






<script type="text/javascript">
$(document).ready(function()
{
  $(function()
  {
    //auto compléte l'adresse, ville et code postal
    $("#idAdresse").autocomplete({
      source: function (request, response) {
        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?limit=5",
            data: { q: request.term },
            dataType: "json",
            success: function (data) {
                response($.map(data.features, function (item) {
                    return {
                        label: item.properties.label,
                        postcode: item.properties.postcode,
                        city: item.properties.city,
                        value: item.properties.label,
                        housenumber: item.properties.housenumber,
                        street: item.properties.street,
                        name: item.properties.name,
                        latitude: item.geometry.coordinates[1],
                        longitude: item.geometry.coordinates[0]
                    };
                }));
            }
        });
      },
      select: function(event, ui) {
        $('#idCP').val(ui.item.postcode);
        $('#idVille').val(ui.item.city);
        $('#idNumero').val(ui.item.housenumber);
        if(ui.item.street)
        $('#idRue').val(ui.item.street);
        else
        $('#idRue').val(ui.item.name);
        $("#idLatitude").val(ui.item.latitude);
        $("#idLongitude").val(ui.item.longitude);
      }
    });//fin de l'autocomplete
   });//fin du function
});//fin du ready
</script>




