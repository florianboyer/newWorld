<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>saisie lot</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap core CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        

        <!-- Material Design Bootstrap -->
        <link href="../../css/mdb.min.css" rel="stylesheet">

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
            body{
                background-color: #CFD2D2;
                color: black !important;
            }
            form{
                padding-left: 10%;
                padding-right: 10%;
                padding-top: 5%;
            }

            /*controle des données*/
            input.controle {
              outline:0;
              font-size:14px;
              width:250px;
              height:15px;
            }   
            label.label {
              display:inline-block;
              width:200px;
              text-align: right;
              font-style: italic;
              margin-right:5px;
              height: 15px;
            }
            input.controle:valid {
              border:2px solid #0a0;
            }
            input.controle:invalid {
              border:2px solid #a00;
            }
            input.controle:valid + span:before  {
              content: "\f00c";
              font-family: "FontAwesome";
              color:#0a0;
              font-size: 1.5em;
            }   
            input.controle:invalid + span:before  {
              content: "\f00d";
              font-family: "FontAwesome";
              color:#a00;
              font-size: 1.5em;
            }
        </style>
    </head>
    <body>
    <div style="background-color: #CFD2D2;">
        <?php include ('../bandeauMenu.php');?>
    </div>

        <!-- Formulaire de saisie des lots -->
        <form>
            <p class="h4 text-center mb-4">Saisie du lot</p><br>
                <!-- Type de produit -->
            <label for="defaultFormSubscriptionNameEx">Type de produit</label>
            <input type="text" id="defaultFormSubscriptionNameEx" />
                <!-- Produit -->
            <label for="defaultFormSubscriptionNameEx">Produit</label>
            <input type="text" id="defaultFormSubscriptionNameEx" />
                <!-- Variété -->
            <label for="defaultFormSubscriptionNameEx">Variété</label>
            <input type="text" id="defaultFormSubscriptionNameEx" />
                <!-- Numero de parcelle -->
            <label for="defaultFormSubscriptionNameEx">Numero de parcelle</label>
            <input class="controle" type="number" name="contribution" min="0" max="10" required placeholder="Entre 1 et 10"> 
            <span class="resultat"></span><br/>
                <!-- Quantité d'achat -->
            <label for="defaultFormSubscriptionNameEx">Quantité d'achat</label>
            <input class="controle" type="number" name="contribution" min="0" max="10" required placeholder="Entre 1 et 10"> 
            <span class="resultat"></span><br/>
                <!-- Date Limite de consommation -->
            <label for="defaultFormSubscriptionNameEx">Date Limite de consommation</label>
            <input type="date" id="defaultFormSubscriptionNameEx" />
                <!-- Date de recolte -->
            <label for="defaultFormSubscriptionNameEx">Date de recolte</label>
            <input type="date" id="defaultFormSubscriptionNameEx" />
                <!-- Quantite disponible -->
            <label for="defaultFormSubscriptionNameEx">Quantite disponible</label>
            <input class="controle" type="number" name="contribution" min="0" max="10" required placeholder="Entre 1 et 10"> 
            <span class="resultat"></span><br/>
                <!-- Quantite Total Mis En Vente -->
            <label for="defaultFormSubscriptionNameEx">Quantité total mis en vente</label>
            <input class="controle" type="number" name="contribution" min="0" max="10" required placeholder="Entre 1 et 10"> 
            <span class="resultat"></span><br/>
                <!-- Prix du lot -->
            <label for="defaultFormSubscriptionNameEx">Prix du lot</label>
            <input class="controle" type="number" name="contribution" min="0" max="10" required placeholder="Entre 1 et 10"> 
            <span class="resultat"></span><br/>
                <!-- Unité de mesure -->
            <label for="defaultFormSubscriptionNameEx">Unité de mesure</label>
            <input type="text" id="defaultFormSubscriptionNameEx" />

            <div class="text-center mt-4">
                <button class="btn btn-outline-purple" type="submit">Valider<i class="fa fa-paper-plane-o ml-2"></i></button>
            </div>
        </form>
        <!-- Formulaire de saisie des lots -->

        <?php include ('../bandeauFin.php');?>

    </body>
</html>
                      