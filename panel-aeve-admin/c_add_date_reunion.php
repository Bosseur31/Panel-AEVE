<?php

$location = 'c_add_date_reunion.php';

include('session.php');
include('mysql.php');
include('head-admin.html');
include('nav-bar-admin.html');
?>


<!doctype html>
<html lang="fr">
<head>

</head>
<body>

<section class="page-section" style="margin-top: 5%;" id="contact">
    <div class="container">

        <!-- Contact Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ajouter une date de reunion</h2>

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

                <form method="POST" action="add_date_reunion.php" enctype="multipart/form-data" id="myform">
                    <br><br><br>
                    <label class="control-label">Entrer un date de Réunion</label>
                    <div class='input-group date' id='datetimepicker'>
                        <input type='text' class="form-control" name="date"/>
                        <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                    </div>

                    <br><br><br>

                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl" id="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<script>

    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'YYYY/MM/DD HH:mm',
        });
    });

</script>

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

</html>
