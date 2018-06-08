<?php
include ('connectionBase.php');
?>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
   <div class="container">
      <a class="navbar-brand" href="http://localhost/~fboyer/newWorldProjetV3/">NW</a>
       
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
               <a class="nav-link" href="#">Acheter</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Produire</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Distribuer</a>
            </li>
            <li class="nav-item"> 
            <?php
               echo"<p class=\"pseudoPersonneMenu\"> Bonjour ".$pseudo."</p>";
            ?>
            </li>
            <li class="nav-item">
            <form method="POST" action="mesPages/connectionInscription/seDeconnecter.php">
               <button class="btn-info" type="submit" name="validerDeconnection">Se déconnecter<i class="fa fa-sign-in ml-1"></i></button>
            </form>
            </li>
         </ul>
         <?php
            }
            else {
         ?>
         <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <button class="btn-info" type="submit" name="validerConnection"  href="seConnecter.php" >Se connecter<i class="fa fa-sign-in ml-1"></i></button>
            </li>
         </ul>
         <?php
            }
         ?>
         <!--FIN bandeau menu seulement si la personne est connecté -->
         <form class="form-inline fa fa-search prefix">
            <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" aria-label="Search">
         </form>
       </div>
   </div>
</nav>
<!--/.Navbar-->




<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8&appId=586941824848574";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script>
  // This is called with the results from  FB.getLoginStatus().
  function statusChangeCallback(response) 
  {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }//fin du statusChangeCallback(response)

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{586941824848574}',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };//fin de la fonction window.fbAsyncInit
  
//ma fonction pour poster les données reçues de facebook
  function postDonneesFB(idFB, mailFB)
  { 
    var request = $.ajax({
    url: "http://gthom.btsinfogap.org/newWorld/traiteFormulaires.php",
    method: "POST",
    data: { idFacebook : idFB, mailFacebook : mailFB  }
    });
    request.done(function( msg ) 
    {
      console.log( msg );
      //location="http://gthom.btsinfogap.org/newWorld/index.php";
      //fermer la fenêtre modal_login en jquery
      //$("#modal_login").close;//not function

      $("#modal_login .close").click();
      //window.referer.location="http://gthom.btsinfogap.org/newWorld/index.php";marche pas
    });
    request.fail(function( msg ) 
    {
      console.log("ident facebook erreur");
      //location.reload();
      //fermer la fenêtre modal_login en jquery marche pas
      //$("#modal_login").close;
    });
  }//fin de la fonction postDonneesFB(idFB, mailFB)
  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() 
  {
    
    FB.api('/me?fields=name,email,id', function(response) {
      //traitement de la reponse
      postDonneesFB(response.id,response.email );
      //fin du traitement de la réponse
    },{scope: 'email,public_profile'});
  }//fin de la fonction testAPI()
 
</script>


    <main>
        <div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="formulaireConnection.php" role="tab"><i class="fa fa-user mr-1"></i> Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="formulaireInscription.php" role="tab"><i class="fa fa-user-plus mr-1"></i> S'inscrire</a>
                    </li>
                </ul>

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
                                <p>Pas encore menbre? <a href="formulaireInscription.php" class="blue-text">S'inscrire</a></p>
                                <p>Mot de passe oublié? <a href="#" class="blue-text">mot de Passe</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Fermer</button>
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
                                <p class="pt-1">Vous avez déjà un compte? <a href="formulaireConnection.php" class="blue-text"> Se connecter</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                    </form>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
        </div>
        </div>
        <!--Modal: Login / Register Form-->
    </main>
    <script>
//rechargement de la page principale lors de la fermeture de la fenêtre de login
  $('#modal_login').on('hidden.bs.modal', function () {
    location.reload();
  });
</script>

   <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
