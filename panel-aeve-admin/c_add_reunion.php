<?php

$location = "c_add_reunion.php";

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
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ajouter compte rendu
            reunion</h2>

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
                <form method="POST" action="add_upload.php" enctype="multipart/form-data" id="cr">
                    <br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLangHTML" name="reunion"
                               required="required">
                        <label class="custom-file-label" for="customFileLangHTML" data-browse="Choisir">Selectionner
                            compte rendu</label>
                    </div>

                    <br><br><br>
                    <strong>Le fichier sera accessible depuis l'onglet info et reunion du site, un mail d'information
                        sera envoyé a tout les benevoles</strong>
                    <br><br>

                    <p>Choisir le type de Compte rendu :</p>

                    <div>
                        <input type="radio" id="cr_eval" name="type_cr" value="Évaluation">
                        <label for="cr_eval">Évaluation</label>
                    </div>

                    <div>
                        <input type="radio" id="cr_reu" name="type_cr" value="Réunion" checked>
                        <label for="cr_reu">Réunion</label>
                    </div>

                    <br><br>

                    <p>Mail de notification :</p>

                    <div>
                        <input type="radio" id="mailoff" name="sendmail" value="mailoff">
                        <label for="mailoff">Pas d'envoi de mail</label>
                    </div>

                    <div>
                        <input type="radio" id="mailon" name="sendmail" value="mailon" checked>
                        <label for="mailon">Envoi d'un mail</label>
                    </div>

                    <br><br>

                    <p>Date de la Réunion/Evaluation :</p>

                    <div>
                        <div class='input-group date datetimepicker col-md-5' id='datetimepicker'>

                            <input type='text' class="form-control" name="date"/>
                            <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>

                        </div>
                    </div>

                    <br><br>
                    <strong>Date de la reunion, la mettre dans le titre du fichier est egalement conseillé</strong>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'YYYY/MM/DD',
        });
    });
</script>
<script>

    $(document).ready(function () {

        $("#cr").submit(function (e) {
            e.preventDefault();
            var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
            var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
            //var form_data = $(this).serialize();
            $.ajax({
                url: form_url,
                type: form_method,
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                success: function (html) {
                    $('#alert').html(html);
                },
                error: function () {
                    $('#alert').html(html);
                }
            });
        });
    });

</script>

</body>
</html>
