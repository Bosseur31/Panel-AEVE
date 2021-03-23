<?php

$location = 'add_mail.php';

include('session.php');

if (empty($_POST['newmail']) || empty($_POST['prenom']) || empty($_POST['nom']) || !filter_var($_POST['newmail'], FILTER_VALIDATE_EMAIL)) {
    echo 'Email ' . $_POST['newmail'] . 'invalide';
    exit();
}

include('mysql.php');


$mail = $_POST['newmail'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];


$req = $bdd->prepare('INSERT INTO site.mail(identifiant, mail, prenom, nom) VALUES(:identifiant, :mail, :prenom, :nom)') or die(print_r($bdd->errorInfo()));
$req->execute(array(
    'identifiant' => $identifiant,
    'mail' => $mail,
    'prenom' => $prenom,
    'nom' => $nom,
));

echo "<div class='alert alert-success' role='alert' id='alert'>
Le bénévole $prenom $nom $mail a etait ajouté avec succés, la liste des bénévole est disponible <a href='c_mail.php' class='alert-link'>ICI</a> !
        </div>";

?>