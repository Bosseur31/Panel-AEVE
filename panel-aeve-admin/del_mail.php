<?php

$location = "del_mail.php";
include('session.php');

if (empty($_GET['mail']) || !filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL)) {
    echo 'Email invalide (' . $_GET['mail'] . ') ';
    exit();
}

include('mysql.php');
//attention la valeur mail comprise dans le include mysql interferer avec celle a supprimer garder le include au dessu
$mail = $_GET['mail'];

$req = $bdd->prepare('DELETE FROM mail WHERE mail = :mail') or die(print_r($bdd->errorInfo()));
$req->execute(['mail' => $mail]);

echo "<div class=\"alert alert-success\" role=\"alert\" id=\"alert\">
L'email $mail a etait supprimé avec succés, il disparaitra une fois la page rechargé !
        </div>";

?>