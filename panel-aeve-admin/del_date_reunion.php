<?php

$location = "del_date_reunion.php";
include('session.php');

if (empty($_GET['id'])) {
    echo 'Erreur';
    exit();
}

$id = $_GET['id'];

include('mysql.php');

$req = $bdd->prepare('DELETE FROM date_reunion WHERE id = :id') or die(print_r($bdd->errorInfo()));
$req->execute(['id' => $id]);

echo "<div class='alert alert-success' role='alert' id='alert'>
La date a etait supprimé, elle disparaitra une fois la page rechargé !
        </div>";

?>