<?php

$location = "del_reunion.php";
include('session.php');

if (empty($_GET['date'])) {
    echo 'Erreur';
    exit();
}

$date = $_GET['date'];

include('mysql.php');

$req = $bdd->prepare('DELETE FROM cr_reunion WHERE date_r = :date') or die(print_r($bdd->errorInfo()));
$req->execute(['date' => $date]);

echo "<div class='alert alert-success' role='alert' id='alert'>
La réunion a etait supprimé, elle disparaitra une fois la page rechargé !
        </div>";

