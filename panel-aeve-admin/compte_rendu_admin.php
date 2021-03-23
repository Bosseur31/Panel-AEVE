<?php

$location = "compte_rendu_admin.php";

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
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Compte rendu réunion</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <br><br>

        <a class="bene-add" href="c_add_reunion.php"><i class="fas fa-plus-circle"> </i></a>

        <div id="alert">

        </div>
        <br><br>

        <div class="contour" id="contour">
            <?php

            // On récupère tout le contenu de la table jeux_video
            $reponse = $bdd->prepare('SELECT * FROM site.cr_reunion WHERE identifiant = :prenom ORDER BY id DESC');
            $reponse->execute(['prenom' => $identifiant]);
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()) {
                ?>

                <div class="list-bene">
                    <div class="bene-titre">
                        <a>Compte rendu ecrit <?php echo $donnees['emplacement']; ?>, <?php echo $donnees['infos']; ?>
                            du <?php echo $donnees['date_r']; ?> </a>


                        <div class="bene-icon-dl">
                            <a href="../data/cr_reunion/<?php echo $donnees['emplacement']; ?>" class="btn"> <i
                                        class="fas fa-glasses"></i> Lire </a>
                        </div>

                        <div class="bene-icon-trash">
                            <button type="button" date='<?php echo $donnees['date_r']; ?>' class="trash btn"><i
                                        class="fas fa-trash-alt" style="color: #B90000;"></i> Supprimer
                            </button>
                        </div>
                    </div>

                </div>

                <?php
            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            ?>
        </div>
        <script>

            $(document).ready(function () {
                $('button.trash').click(function (e) {
                    e.preventDefault();
                    const date = $(this).attr('date');
                    $.ajax({
                        type: "GET",
                        url: "del_reunion.php?date=" + date,
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
