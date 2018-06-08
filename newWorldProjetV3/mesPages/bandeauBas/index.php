<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>New World</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

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

</head>

<body>

    <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="#">NW</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--Debut bandeau menu seulement si la personne est connecté -->
                <?php
                // si la personne est connecté 
                if(isset($_SESSION["pseudo"])){
                    //on recupere le pseudo de la personne
                    $pseudo = $_SESSION["pseudo"];
                ?>
                <!-- affichage du menu -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Achete</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Produire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Distribuer</a>
                        </li>
                    </ul>
                    <?php
                    "<p> Bonjour " $pseudo;"</p>"
                }
                    ?>
                    <!--FIN bandeau menu seulement si la personne est connecté -->
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" aria-label="Search">
                    </form>
                </div>
            </div>
        </nav>
    <!--/.Navbar-->
    
    <!--Carousel Wrapper-->
    <div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="false">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-3" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-3" data-slide-to="1"></li>
            <li data-target="#carousel-example-3" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!-- First slide -->
            <div class="carousel-item active view hm-black-light" style="background-image: url('img/site/fruitLegume.jpg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="h1-responsive flex-item font-bold">New World <br>le soleil dans vos paniers.</h1>
                            <li>
                            <p class="flex-item">       
                                Un gage de qualité.<br>
                                Des produits frais <br>
                                New World vous propose le meilleur <br> 
                                de votre region directement chez vous. <br>
                            </p>
                            </li>
                            <li>
                                <a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-primary btn-lg flex-item" rel="nofollow">Se connnecter!</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://mdbootstrap.com/material-design-for-bootstrap/" class="btn btn-secondary btn-lg flex-item" rel="nofollow">S'inscrire</a>
                            </li>
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.First slide -->

            <!-- Second slide -->
            <div class="carousel-item view hm-black-light" style="background-image: url('img/site/monde.png'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="h1-responsive">Lots of tutorials at your disposal</h1>
                        </li>
                        <li>
                            <p class="my-4">And all of them are FREE!</p>
                        </li>
                        <li>
                            <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-primary btn-lg" rel="nofollow">Start learning</a>
                        </li>
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.Second slide -->

            <!-- Third slide -->
            <div class="carousel-item view hm-black-light" style="background-image: url('img/site/monde.png'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="h1-responsive">Visit our support forum</h1></li>
                        <li>
                            <p class="my-4">Our community can help you with any question</p>
                        </li>
                        <li>
                            <a target="_blank" href="https://mdbootstrap.com/forums/forum/support/" class="btn btn-default btn-lg" rel="nofollow">Support forum</a>
                        </li>
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.Third slide -->
            
        </div>
        <!--/.Slides-->

        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->
    
    <!--/.Main layout-->

    <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Footer links-->
        <div class="container-fluid">
            <div class="row">
                <!--First column-->
                <div class="col-lg-3 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>La qualité avant tout</strong></h5>
                    <p>Tous nos produits sont digne de qualité.</p>
                    <p>Chaque producteur aura été controlé à l'avance pour répondre au plus juste à vos exigance.</p>
                </div>
                <!--/.First column-->
                <hr class="w-100 clearfix d-sm-none">
                <!--Second column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>Produire</strong></h5>
                    <ul>
                        <li>
                            <a href="#!">Devenir producteur</a>
                        </li>
                        <li>
                            <a href="#!">Proposer vos produits</a>
                        </li>
                        <li>
                            <a href="#!">Nos conditions</a>
                        </li>
                        <li>
                            <a href="#!"></a>
                        </li>
                    </ul>
                </div>
                <!--/.Second column-->
                <hr class="w-100 clearfix d-sm-none">
                <!--Third column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>Points de vente</strong></h5>
                    <ul>
                        <li>
                            <a href="#!">Devenir points de vente</a>
                        </li>
                        <li>
                            <a href="#!">Nos conditions</a>
                        </li>
                        <li>
                            <a href="#!">Nos points de vente    </a>
                        </li>
                        <li>
                            <a href="#!"></a>
                        </li>
                    </ul>
                </div>
                <!--/.Third column-->
                <hr class="w-100 clearfix d-sm-none">
                <!--Fourth column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>Controle</strong></h5>
                    <ul>
                        <li>
                            <a href="mesPages/bandeauBas/controle/commentSontTilEffectue.html">Comment sont t'il effectué?</a>
                        </li>
                        <li>
                            <a href="#!">Pourquoi des controles?</a>
                        </li>
                        <li>
                            <a href="#!">Nous rejoinde</a>
                        </li>
                        <li>
                            <a href="#!"></a>
                        </li>
                    </ul>
                </div>
                <!--/.Fourth column-->
            </div>
        </div>
        <!--/.Footer links-->

        <hr>

        <!--Call to action-->
        <div class="call-to-action">
            <h4 class="mb-5">Nous contacter</h4>
            <ul>
                <li><a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-primary" rel="nofollow">Envoyer un mail</a></li>
                <li><a target="_blank" href="https://mdbootstrap.com/material-design-for-bootstrap/" class="btn btn-default" rel="nofollow">Contact</a></li>
            </ul>
        </div>
        <!--/.Call to action-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                @site soumis au droits d'auteur<a href="https://www.MDBootstrap.com"> Responsable: Mr.Boyer </a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap dropdown -->
    <script type="text/javascript" src="js/popper.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script>
    new WOW().init();
    </script>

</body>

</html>