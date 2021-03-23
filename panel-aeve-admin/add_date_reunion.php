<?php

$location = 'add_date_reunion.php';

include('session.php');
include('mysql.php');

$time = $_POST['date'];

$req = $bdd->prepare('INSERT INTO site.date_reunion(identifiant, time) VALUES(:identifiant, :time)') or die(print_r($bdd->errorInfo()));
$req->execute(array(
    'identifiant' => $identifiant,
    'time' => $time,
));

$timedisplay = date('d/m/Y H:i', strtotime($time));

echo "<div class='alert alert-success' role='alert' id='alert'>
Une nouvelle date de reunion a bien etait ajoutée pour le $timedisplay, la liste des reunions prevuent est disponible <a href='c_date_reunion.php' class='alert-link'>ICI</a> !
        </div>";