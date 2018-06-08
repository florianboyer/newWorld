<?php
include ('connectionBase.php');
?>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar policeGrise">
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
                  echo"<a class=\"pseudoPersonneMenu\" href=\"http://localhost/~fboyer/newWorldProjetV3/mesPages/monCompte.php\"> Bonjour ".$pseudo."</a>";
               ?>
            </li>
            <li class="nav-item">
               <form method="POST" action="">
                  <button class="btn-info" type="submit" name="validerDeconnection">Se déconnecter<i class="fa fa-sign-in ml-1"></i></button>
                  <?php
                  //pour rafraichir la page
                     $delai=0.5; 
                     $url='http://localhost/~fboyer/newWorldProjetV3/';
                        if (isset($_SESSION['pseudo']) && (isset($_REQUEST['validerDeconnection']))) {
                           unset($_SESSION['pseudo']);
                           header("Refresh: $delai; url=$url");
                           echo "Vous avez été déconnecté avec succés";
                        }
                  ?>
               </form>
            </li>
         </ul>
         <?php
            }
            else {
         ?>
         <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <a class="btn-info" type="submit" name="validerConnection"  href="http://localhost/~fboyer/newWorldProjetV3/mesPages/connectionInscription/formulaireConnection.php" >Se connecter<i class="fa fa-sign-in ml-1"></i></a>
            </li>
         </ul>
         <?php
            }
            "</div>"
         ?>
         <!--FIN bandeau menu seulement si la personne est connecté -->
         <form class="form-inline fa fa-search prefix">
            <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" aria-label="Search">
         </form>

   </div>
</nav>
<!--/.Navbar-->

<!-- JQuery -->
<script type="text/javascript" src="/~fboyer/newWorldProjetV3/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/~fboyer/newWorldProjetV3/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/~fboyer/newWorldProjetV3/js/tether.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/~fboyer/newWorldProjetV3/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="/~fboyer/newWorldProjetV3/js/mdb.min.js"></script>
