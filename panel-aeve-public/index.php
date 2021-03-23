<?php

session_start();


if (!isset($_SESSION['password'])) {
    $_SESSION['location'] = 'index.php';
    header("Location: password.php");
    exit;
}

$identifiant = $_SESSION['password'];

include('mysql.php');
include('nav-bar.html');
include('date.php');

?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Retrouver tout le nécéssaire en tant que bénévole de simon">
    <meta name="author" content="Aymeric Maisonneuve">

    <title>Vidéo <?php echo "$prenom" ?></title>

    <!-- Custom fonts for this theme -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <!-- Réunion -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>


</head>

<body id="page-top">
<!-- Masthead -->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

        <!-- Masthead Avatar Image -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Masthead Heading -->
        <h1 class="masthead-heading text-uppercase mb-0"><?php echo "$prenom" ?> vidéo</h1>

        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Réunion -->
        <?php
        if (!empty($time)) {
            echo
            "<div class='alert alert-danger'>
            <a data-dismiss='alert' class='close'>x</a>
            <i class='fas fa-exclamation-triangle'></i> &nbsp; &nbsp;
               Prochaine réunion prévu $last_date &nbsp; &nbsp; &nbsp;
            <i class='fas fa-exclamation-triangle'></i> &nbsp; &nbsp; &nbsp; &nbsp;
        </div>";
        }
        ?>
        <!-- Masthead Subheading -->
    </div>
</header>

<!-- Portfolio Section -->
<section class="page-section portfolio" id="portfolio">
    <div class="container">

        <!-- Portfolio Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Les vidéos</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Portfolio Grid Items -->
        <div class="row">

            <!-- Portfolio Séances -->
            <div class="col-md-6 col-lg-4">
                <a href='<?php echo $salle_jeux; ?>'>
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-file-video fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/cabin1.png" alt="">
                    </div>
                </a>
            </div>

            <!-- Portfolio Réunions -->
            <div class="col-md-6 col-lg-4">
                <a href='<?php echo $reunion; ?>'>
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-file-video fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/cake1.png" alt="">

                    </div>
                </a>
            </div>

            <!-- Portfolio Quotidien -->
            <div class="col-md-6 col-lg-4">
                <a href='<?php echo $quotidien; ?>'>
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-file-video fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/circus1.png" alt="">
                    </div>
                </a>
            </div>

            <!-- Portfolio Archives -->
            <div class="col-md-6 col-lg-4 mx-auto">
                <a href='<?php echo $archive; ?>'>
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-file-video fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/submarine1.png" alt="">

                    </div>
                </a>
            </div>

        </div>
        <!-- /.row -->

    </div>
</section>

<!-- About Section -->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

        <!-- About Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-white">Le calendrier de la semaine</h2>

        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- About Section Content -->
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <p class="lead">Vous pourrez bientot télécharger chaque semaine le calendrier des séances pour ne pas
                    etre perdue</p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p class="lead">Si vous voyez un crénaux libre qui vous correspond mieux, ou que vous souhaitez faire
                    une séance supplémantaire envoyer un mail ou utilisez le bouton proposer une disponibilité.</p>
            </div>
        </div>
        <br>

        <!-- About Section Button
        <div class=" text-center ml-auto">
          <a class="btn btn-xl btn-outline-light" href="calendrier/calendrier.jpg" download="calendrier.jpg">
            <i class="fas fa-download mr-2"></i>
            Calendrier
          </a>
        </div><br>
          -->
        <div class=" text-center mr-auto">
            <a class="btn btn-xl btn-outline-light" href="contact.php">
                <i class="fas fa-envelope mr-2"></i>
                Proposer disponibilité
            </a>
        </div>

    </div>
</section>

<!-- Contact Section
<section class="page-section  mb-0" id="contact">
  <div class="container">


    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ressources</h2>


    <div class="divider-custom">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon">
        <i class="fas fa-star"></i>
      </div>
      <div class="divider-custom-line"></div>
    </div><br>
    <div class="row">
      <div class="mx-auto">
        <p class="lead">Toute les ressources utile sont ici : document, extrait de livre, date reunion etc...</p>
      </div>
    </div><br>
    <div class="text-center mr-auto">
      <button class="btn btn-xl btn-outline-light bg-primary dropdown-toggle" type="button" data-toggle="dropdown">Ressources
      <span class="caret"></span></button>
       <ul class="dropdown-menu">
        <li><a href="compte-rendu.php">Compte rendu réunions</a></li>
        <li class="divider"></li>
        <li><a href="https://cloud.aymeric-mai.fr/index.php/s/C23T6c7BCeAEA7e">Comprendre l'autisme</a></li>
       </ul>
    </div>
</section> -->

<section class="page-section bg-primary text-white mb-0" id="reunion">
    <div class="container">

        <!-- About Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-white">Les reunions</h2>

        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- About Section Content -->
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <p class="lead">La prochaine réunion de <?php echo "$prenom" ?> aura
                    lieu <?php echo "$last_date"; ?></p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p class="lead">Retrouvez également l'ensemble du contenu des réunions passées, compte rendu et
                    évaluation des réunions. </p>
            </div>
        </div>
        <br>

        <!-- About Section Button -->
        <div class=" text-center ml-auto">
            <a class="btn btn-xl btn-outline-light" href='compte_rendu.php'>
                <i class="far fa-file-alt mr-2"></i>
                Compte-rendu
            </a>
        </div>
        <br>

        <!--- <div class=" text-center mr-auto">
           <a class="btn btn-xl btn-outline-light" href="contact.php">
             <i class="far fa-file-video mr-2"></i>
             Vidéo reunion
           </a>
         </div> ---->

    </div>
</section>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">

            <!-- Footer Location -->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Adresse</h4>
                <p class="lead mb-0"><?php echo $ville; ?> <br> <?php echo $postal; ?></p>
            </div>

            <!-- Footer Social Icons -->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Réseaux</h4>
                <a class="btn btn-outline-light btn-social mx-1" href=<?php echo $facebook; ?>>
                    <i class="fab fa-fw fa-facebook-f"></i>
                </a>
                <a class="btn btn-outline-light btn-social mx-1" href=<?php echo $insta; ?>>
                    <i class="fab fa-fw fa-instagram"></i>
                </a>

            </div>

            <!-- Footer About Text -->
            <div class="col-lg-4">
                <h4 class="text-uppercase mb-4">Contact</h4>
                <p class="lead mb-0">Mail : <?php echo $mail; ?> <br><br>
                    <a href="contact_inconnu.php">Contacter par le site</a></p>
            </div>

        </div>
    </div>
</footer>


<!-- Copyright Section -->
<section class="copyright py-4 text-center text-white">
    <div class="container">
        <small>Aymeric Maisonneuve &copy; 2019</small>
    </div>
</section>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- Portfolio Modals -->


</body>

</html>
