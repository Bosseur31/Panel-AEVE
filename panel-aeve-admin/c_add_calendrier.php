<?php

$location = 'c_add_calendrier.php';

include('session.php');
include('mysql.php');
include('head-admin.html');
include('nav-bar-admin.html');

$today = date("Y-m-d H:i:s");

?>


<!doctype html>
<html lang="fr">
<body>

<section class="page-section" style="margin-top: 5%;" id="contact">
    <div class="container">

        <!-- Contact Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ajouter calendrier de la
            semaine</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Contact Section Form -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <form method="POST" action="add_upload.php" enctype="multipart/form-data">
                    <br><br><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLangHTML" name="calendrier"
                               required="required">
                        <label class="custom-file-label" for="customFileLangHTML" data-browse="Choisir">Selectionner un
                            calendrier</label>
                    </div>

                    <br><br><br><br>

                    <p>Calendrier :</p>

                    <div>
                        <input type="radio" id="ca_cours" name="date_ca" value="Cette semaine">
                        <label for="ca_cours">Semaine en cours</label>
                    </div>

                    <div>
                        <input type="radio" id="ca_pro" name="date_ca" value="Semaine prochaine" checked>
                        <label for="ca_pro">Semaine prochaine</label>
                    </div>

                    <br><br><br><br>

                    <p>Mail de notification :</p>

                    <div>
                        <input type="radio" id="mailoff" name="sendmail" value="mailoff">
                        <label for="mailoff">Pas d'envoi de mail</label>
                    </div>

                    <div>
                        <input type="radio" id="mailon" name="sendmail" value="mailon" checked>
                        <label for="mailon">Envoi d'un mail</label>
                    </div>

                    <br><br><br>

                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

<script type="text/javascript" src="vendor/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/freelancer.min.js"></script>

</body>
</html>