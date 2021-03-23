<?php

session_start();
include('session.php');


if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    echo 'Email ' . $_POST['mail'] . 'invalide';
    exit();
}

include('mysql.php');

$mail = $_POST['mail'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$domaine = $_POST['domaine'];
$ville = $_POST['ville'];
$postal = $_POST['code_postal'];
$facebook = $_POST['facebook'];
$insta = $_POST['instagram'];
$salle_jeux = $_POST['lien_salle_jeux'];
$quotidien = $_POST['lien_quotidien'];
$reunion = $_POST['lien_reunion'];
$archive = $_POST['lien_archive'];

$req = $bdd->prepare('DELETE FROM infos_enfant WHERE identifiant = :identifiant') or die(print_r($bdd->errorInfo()));
$req->execute(['identifiant' => $identifiant]);

$req = $bdd->prepare('INSERT INTO infos_enfant( identifiant, mail, prenom, nom, nom_domaine, ville, code_postal, facebook, instagram, lien_salle_jeux, lien_quotidien, lien_archive, lien_reunion ) VALUES( :identifiant, :mail, :prenom, :nom, :nom_domaine, :ville, :code_postal, :facebook, :instagram, :lien_salle_jeux, :lien_quotidien, :lien_archive, :lien_reunion)') or die(print_r($bdd->errorInfo()));
$req->execute(array(
    'identifiant' => $identifiant,
    'mail' => $mail,
    'prenom' => $prenom,
    'nom' => $nom,
    'nom_domaine' => $domaine,
    'ville' => $ville,
    'code_postal' => $postal,
    'facebook' => $facebook,
    'instagram' => $insta,
    'lien_salle_jeux' => $salle_jeux,
    'lien_quotidien' => $quotidien,
    'lien_archive' => $archive,
    'lien_reunion' => $reunion,
));

echo "<div class='alert alert-success' role='alert' id='alert'>
La configuration a bien etait mise a jour !
        </div>";


