<?php

$location = 'c_add_newmail.php';

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
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ajouter un nouveau benevole</h2>

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
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <form method="POST" action="add_mail.php" enctype="multipart/form-data" id="myform">
                    <br><br><br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nom </label>
                        <input type="text" class="form-control" id="nom" name="nom"
                               placeholder="Entrer nom du benevole">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Prénom </label>
                        <input type="text" class="form-control" id="prenom" name="prenom"
                               placeholder="Entrer prenom du benevole">
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mail </label>
                        <input type="email" class="form-control" id="newmail " name="newmail"
                               placeholder="Entrer mail du benevole">
                    </div>


                    <br><br><br><br>

                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl" id="submit">Envoyer</button>
                    </div>
                </form>
            </div>
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