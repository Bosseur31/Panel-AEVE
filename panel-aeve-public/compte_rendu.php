
<?php

session_start();


if (!isset($_SESSION['password'])) { $_SESSION['location'] = 'compte_rendu.php'; header("Location: password.php"); EXIT; }

$identifiant = $_SESSION['password'];

include('mysql.php');
include('head.html');
include('nav-bar.html');

?>

<!DOCTYPE html>
<html lang="fr">
<body id="page-top">

<!-- Portfolio Section -->
<section class="page-section portfolio" id="portfolio">
    <div class="container">

        <!-- Portfolio Section Heading -->
        <br><br><br><br><br><br><h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Les Comptes Rendus</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div><br><br><br><br>

        <?php
        try
        {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=192.168.1.145;dbname=site;charset=utf8', 'newhouse', 'aymeric54');
        }
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }

        // Si tout va bien, on peut continuer

        // On récupère tout le contenu de la table jeux_video
        $reponse = $bdd->prepare('SELECT * FROM site.cr_reunion WHERE identifiant = :identifiant ORDER BY id DESC');
        $reponse->execute(['identifiant' => $identifiant]);
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
            ?>

            <div class="dl-cr">
                <div class="cr-titre">
                    <a>Compte rendu ecrit <?php echo $donnees['infos']; ?> du <?php echo $donnees['date_r']; ?> nommé <?php echo $donnees['emplacement']; ?> </a>


                    <div class="cr-icon-read">
                        <a href="../data/cr_reunion/<?php echo $donnees['emplacement']; ?>"> <i class="fas fa-glasses"></i> Lire </a>
                    </div>

                    <div class="cr-icon-dl">
                        <a href="../data/cr_reunion/<?php echo $donnees['emplacement']; ?>" download="Compte-rendu-du-<?php echo $donnees['date_r']; ?>.pdf"> <i class="fas fa-file-download"></i> Télécharger </a>
                    </div>
                </div>

            </div>

            <?php
        }

        $reponse->closeCursor(); // Termine le traitement de la requête

        ?>

</body>

</html>