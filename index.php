<?php 
  require_once "db.php";
  require_once "functions.php";
?>
<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>FARassos</title>
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="images/logoFAR.jpg" width="30" height="30" alt="">
        </a>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-accueil-tab" data-toggle="pill" href="#pills-accueil" role="tab" aria-controls="pills-accueil" aria-selected="true">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-qsn-tab" data-toggle="pill" href="#pills-qsn" role="tab" aria-controls="pills-qsn" aria-selected="false">Qui sommes-nous ?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-forum-tab" data-toggle="pill" href="#pills-forum" role="tab" aria-controls="pills-forum" aria-selected="false">Forum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-nr-tab" data-toggle="pill" href="#pills-nr" role="tab" aria-controls="pills-nr" aria-selected="false">Nous rejoindre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-don-tab" data-toggle="pill" href="#pills-don" role="tab" aria-controls="pills-don" aria-selected="false">Dons</a>
          </li>
        </ul>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-md-auto">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Écrire ici..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
                </form>
                <?php   if(!isConnected()) { ?>
                <li class="nav-item">
                        <a class="nav-link" href="inscription.php">S'inscrire</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Se connecter</a>
                </li>
                <?php   } ?>
                <?php   if(isConnected()) { ?>                 
                  <li class="nav-item">
                  <a class="nav-link" href="./deconnexion.php"><?= $_SESSION['user']['Nom'] ?> Se deconnecter</a>
                   </li>
                  <?php   } ?>
                  <?php   if(isAdmin()) { ?>
                  <li class="nav-item">
                  <a class="nav-link" href="../site/back/gestion_membre/index.php">Gestion Utilisateur</a>
                   </li>
                  <?php   } ?>
               
            </ul>
        </div>
        </nav>
      </header>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-accueil" role="tabpanel" aria-labelledby="pills-accueil-tab">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item">
                  <img src="images/petitsyrien.jpg" width="1500" height="500">
                  <div class="container">
                    <div class="carousel-caption text-left">
                      <h1>Seismes</h1>
                      <p>La Syrie et la Turquie ont été touchés par des tremblements de terres destructeurs qui ont commit plusieurs morts.</p>
                      <p><a class="btn btn-lg btn-success" href="#" role="button">Lire l'article</a></p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item active">
                  <img src="images/volunteer.jpg" width="1500" height="500">
                  <div class="container">
                    <div class="carousel-caption">
                      <h1>Aide humanitaire</h1>
                      <p>L'association FARassos cherche des benevoles pour un voyage humanitaire dans un village au Congo.</p>
                      <p><a class="btn btn-lg btn-success" href="#" role="button">Rejoins nous</a></p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="images/sdf.jpg" width="1500" height="500">
                  <div class="container">
                    <div class="carousel-caption text-right">
                      <h1>Un petit geste pour les sdf</h1>
                      <p>FARassos organise une maraude de distribution de nourriture pour les sans abris afin qu'ils puissent subsister durant cette periode froide.</p>
                      <p><a class="btn btn-lg btn-success" href="#" role="button">Faire un don</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            </div>
            <div class="tab-pane fade" id="pills-qsn" role="tabpanel" aria-labelledby="pills-qsn-tab">
              <div class="container">
                  <div class="row mb-3">
                    <h1 class="col-12">Notre histoire</h1>
                  </div>
                  <div class="row mb-3">
                  <div class="col-lg-7">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                  <div class="col-lg-5">
                    <img src="images/help.jpg" alt="image" class="img-fluid">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-7">
                    <p class="h1"></p>
                  </div>
                  <div class="col-lg-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                  <div class="col-lg-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-forum" role="tabpanel" aria-labelledby="pills-forum-tab">
              L’accès au forum sera réservé seulement aux personnes, étant inscrites sur la plateforme et aux bénévoles, ces personnes là pourront entrer en contact entre eux sur un chat général, commun à tout le monde. Mais ils auront aussi la possibilité de créer des chats privés. Les personnes seulement inscrites n’auront pas autant d’accès que les bénévoles. Effectivement, tout d'abord ces derniers seront automatiquement  ajoutés, dans les chats de leurs missions et dans un chat commun à tous les bénévoles. De plus, les bénévoles pourront avoir des rôles ( comme sur Discord a quelques détails près). Enfin, les bénévoles auront comme avantage de pouvoir entrer en contact avec des personnes démunies d’autres pays, en tant que correspondants. Cela favorise un enrichissement culturel, mais aussi pédagogique. 
            </div>
            <div class="tab-pane fade" id="pills-nr" role="tabpanel" aria-labelledby="pills-nr-tab">
            Nous mettrons ici un formulaire d'inscription pour rejoindre l'association
            </div>
            <div class="tab-pane fade" id="pills-don" role="tabpanel" aria-labelledby="pills-don-tab">
            Sur la majeure partie de la page il y aura sous forme de diagramme circulaire, l’objectif de collecte de dons pour 2023, avec une visibilité sur les dons déjà récoltés. Au milieu du cercle il y aura un fait d’actualité qui variera en fonction de la période. En dessous il y aura une phrase d’accroche tel que “ Si toi aussi tu veux nous aider fais un don “, suivi du même formulaire en ligne disponible sur la page d’accueil. Le choix de la somme du don se fera à l'aide d’un curseur amovible de droite à gauche. Puis ceci sera suivi de la résolution du CAPTCHA, l’acceptation des conditions générales d’utilisation et enfin le classique : “Finaliser l’opération”. En cliquant un petit onglet va apparaître sur la même page, pour pouvoir renseigner ses coordonnées bancaires. Après avoir tout effectué, le donateur sera redirigé vers une page de remerciements avec des confettis en mouvement et un bouton cliquable “Retour à la page d’accueil”
            </div>
        </div>

        <h1>"On est jamais heureux que dans le bonheur qu'on donne"</h1>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <footer>
          <div class="contenu-footer">

            <div class="bloc footer-qsm">
              <h5>Qui sommes nous?</h5>
              <ul class="liste-qsm">
                <li><a href="#">Notre histoire</a></li>
                <li><a href="#">Nos objectifs</a></li>
                <li><a href="#">Notre équipe</a></li>
                <li><a href="#">Localisation</a></li>
                <li><a href="#">Nos collaborateurs</a></li>
              </ul>
            </div>

            <div class="bloc footer-rejoindre">
              <h5>Nous rejoindre</h5>
              <ul class="liste-rejoindre">
                <li><a href="#">Devenir bénévole</a></li>
                <li><a href="#">Faire un don</a></li>
                <li><a href="#">Participer à une mission</a></li>
                <li><a href="#">Parrainer un enfant</a></li>
              </ul>
            </div>

            <div class="bloc footer-contact">
              <h5>Nous contacter</h5>
                <p>Tèl : +33 6 98 62 03 53</p>
                <p>farassos@gmail.com</p>
                <p>7 rue Maison, Paris, 75012 </p>
            </div>            
            
            <div class="bloc footer-reseaux">
              <h5>Nos réseaux</h5>
              <ul class="liste-media">
                <li><a href="https://www.instagram.com/farassos/"name="instagram">
                      <img src="images/iconinsta.svg" alt="instagram">
                    </a></li>
                <li><a href="https://twitter.com/FARASSOS" name="twitter">
                      <img src="images/icontwitter.svg" alt="twitter">
                </a></li>
                <li><a href="" name="LinkedIn">
                      <img src="images/iconlinkedin.svg" alt="LinkedIn">
                </a></li>
              </ul>
            </div>

          </div>
      </footer>

      </body>
</html>