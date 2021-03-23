<?php

$location = 'c_config.php';

include('session.php');
include('mysql.php');
include('head-admin.html');
include('nav-bar-admin.html');
?>


<!doctype html>
<html lang="fr">
<body>

<section class="page-section" style="margin-top: 5%;" id="contact">
    <div class="container">

        <!-- Contact Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Configuration site</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <div id="alert">

        </div>

        <!-- Contact Section Form -->
        <div class="row">
            <div class="col-lg-5 md-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <form method="POST" action="add_config.php" enctype="multipart/form-data" id="myform">
                    <br><br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nom </label>
                        <input type="text" class="form-control" id="nom" name="nom" value='<?php echo $nom; ?>'
                               required="required" data-validation-required-message="Entrer un nom.">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mail </label>
                        <input type="email" class="form-control" id="mail " name="mail" value='<?php echo $mail; ?>'
                               required="required" data-validation-required-message="Entrer un mail.">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ville </label>
                        <input type="text" class="form-control" id="ville" name="ville" value='<?php echo $ville; ?>'
                               required="required" data-validation-required-message="Entrer une ville.">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Lien Facebook (optionnel) </label>
                        <input type="url" class="form-control" id="facebook" name="facebook"
                               value='<?php echo $facebook; ?>'>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nextcloud videos réunions </label>
                        <input type="url" class="form-control" id="lien_reunion" name="lien_reunion"
                               value='<?php echo $reunion; ?>'>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nextcloud videos d'archive </label>
                        <input type="url" class="form-control" id="lien_archive" name="lien_archive"
                               value='<?php echo $archive; ?>'>
                    </div>

            </div>
            <div class="col-lg-5 ml-auto">

                <br><br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Prénom </label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value='<?php echo $prenom; ?>'
                           required="required" data-validation-required-message="Entrer un prenom.">
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nom de domaine (optionnel) </label>
                    <input type="text" class="form-control" id="domaine" name="domaine" value='<?php echo $domaine; ?>'
                           required="required" data-validation-required-message="Entrer un nom de domaine.">
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Code postal </label>
                    <input type="text" class="form-control" id="code_postal" name="code_postal"
                           value='<?php echo $postal; ?>' pattern="[0-9]{5}" required="required"
                           data-validation-required-message="Entrer un code postal.">
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Lien Instagram (optionnel) </label>
                    <input type="url" class="form-control" id="instagram" name="instagram"
                           value='<?php echo $insta; ?>'>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nextcloud videos salle de jeux </label>
                    <input type="url" class="form-control" id="lien_salle_jeux" name="lien_salle_jeux"
                           value='<?php echo $salle_jeux; ?>'>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nextcloud videos du quotidien </label>
                    <input type="url" class="form-control" id="lien_quotidien" name="lien_quotidien"
                           value='<?php echo $quotidien; ?>'>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="mx-auto">
                <br><br>

                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-xl" id="submit">Envoyer</button>
                </div>
            </div>
            </form>

        </div>


    </div>
</section>

<script>

    $(document).ready(function () {

        $("#myform").submit(function (e) {
            e.preventDefault();
            var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
            var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
            var form_data = $(this).serialize();
            $.ajax({
                url: form_url,
                type: form_method,
                data: form_data,
                success: function (html) {
                    $('#alert').html(html);
                },
                error: function () {
                    alert('Une erreur c\'est produite contacté l\'administrateur du site');
                }
            });
        });
    });

</script>

</body>
</html>