<?php

$location = "c_date_reunion.php";

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
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Date réunion</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <br><br>

        <a class="bene-add" href="c_add_date_reunion.php"><i class="fas fa-plus-circle"> </i></a>

        <div id="alert">

        </div>
        <br><br>

        <div class="contour" id="contour">
            <?php

            // On récupère tout le contenu de la table jeux_video
            $reponse = $bdd->prepare('SELECT * FROM site.date_reunion WHERE identifiant = :prenom ORDER BY id DESC');
            $reponse->execute(['prenom' => $identifiant]);
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()) {
                ?>

                <div class="list-bene">
                    <div class="bene-titre">
                        <a>Réunion prévue le <?php $date = $donnees['time'];
                            echo date('d/m/Y', strtotime($date)); ?> a <?php $heure = $donnees['time'];
                            echo date('H', strtotime($heure)); ?>h<?php $minute = $donnees['time'];
                            echo date('i', strtotime($minute)); ?>   </a>


                        <!-- <div class="bene-icon-dl">
                            <button type="button" class="btn"  href="https://data.simon-aeve.fr/compte_rendu_reunion/<?php //echo $donnees['emplacement'];
                        ?>"> <i class="fas fa-glasses"></i> Lire </button>
                        </div> -->

                        <div class="bene-icon-trash">
                            <button type="button" id='<?php echo $donnees['id']; ?>' class="trash btn"><i
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
                    const id = $(this).attr('id');
                    $.ajax({
                        type: "GET",
                        url: "del_date_reunion.php?id=" + id,
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