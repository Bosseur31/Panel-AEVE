<?php

$location = "index-admin.php";

include('session.php');
include('mysql.php');
include('head-admin.html');
include('nav-bar-admin.html');
include('date.php');

?>

<!doctype html>
<html lang="fr">
<body>

<!-- Portfolio Section -->
<section class="page-section portfolio" style="margin-top: 5%;" id="portfolio">
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
        <div class="row" style="margin-top: 5%;">

            <!-- Portfolio Séances -->
            <div class="col-md-6 col-lg-4">
                <a href='<?php echo $salle_jeux; ?>'></a>
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white">
                            <i class="fas fa-file-video fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/cabin1.png" alt="">
                </div>
            </div>

            <!-- Portfolio Réunions -->
            <div class="col-md-6 col-lg-4">
                <a href='<?php echo $reunion; ?>'></a>
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white">
                            <i class="fas fa-file-video fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/cake1.png" alt="">

                </div>
            </div>

            <!-- Portfolio Quotidien -->
            <div class="col-md-6 col-lg-4">
                <a href='<?php echo $quotidien; ?>'></a>
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white">
                            <i class="fas fa-file-video fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/circus1.png" alt="">
                </div>
            </div>

            <!-- Portfolio Archives -->
            <div class="col-md-6 col-lg-4 mx-auto">
                <a href='<?php echo $archive; ?>'></a>
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white">
                            <i class="fas fa-file-video fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/portfolio/submarine1.png" alt="">

                </div>

            </div>


        </div>

</body>

</html>
