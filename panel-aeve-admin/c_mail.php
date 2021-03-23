<?php

$location = "c_mail.php";

include('session.php');
include('mysql.php');
include('head-admin.html');
include('nav-bar-admin.html');


?>

<!DOCTYPE html>
<html lang="fr">

<body id="page-top">

<!-- Portfolio Section -->
<section class="page-section portfolio" id="portfolio">

    <div class="container">

        <!-- Portfolio Section Heading -->
        <br><br><br><br><br><br>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Bénévole</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <br><br>

        <a class="bene-add" href="c_add_newmail.php"><i class="fas fa-plus-circle"> </i></a>

        <div id="alert">

        </div>
        <br><br>

        <div class="contour" id="contour">
            <?php
            // On récupère tout le contenu de la table jeux_video
            $req = $bdd->query('SELECT * FROM site.mail WHERE identifiant = "' . $identifiant . '" ');
            // On affiche chaque entrée une à une
            while ($infos = $req->fetch()) {
                ?>


                <div class="list-bene">
                    <div class="bene-titre">
                        <a class="bene-prenom"><i style="color:#1abc9c;">Prénom :</i> <?php echo $infos['prenom']; ?>
                        </a> <a class="bene-nom"> <i style="color:#1abc9c;">Nom :</i> <?php echo $infos['nom']; ?> </a>
                        <a class="bene-mail"> <i style="color:#1abc9c;">Mail :</i> <?php echo $infos['mail']; ?> </a>


                        <div class="bene-icon-trash">
                            <button type="button" mail='<?php echo $infos['mail']; ?>' class="trash btn"><i
                                        class="fas fa-trash-alt" style="color: #B90000;"></i> Supprimer
                            </button>
                        </div>

                        <!--  <div class="bene-icon-dl">
                            <button type="button" class="btn"><i class="fas fa-edit" style="color: #0FC700 ;"></i> Modifier</button>
                        </div> -->
                    </div>

                </div>

                <?php
            }

            $req->closeCursor(); // Termine le traitement de la requête

            ?>
        </div>
        <script>

            $(document).ready(function () {
                $('button.trash').click(function (e) {
                    e.preventDefault();
                    var mail = $(this).attr('mail');
                    $.ajax({
                        type: "GET",
                        url: "del_mail.php?mail=" + mail,
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
