<?php

$location = 'date.php';

include('session.php');
include('mysql.php');

$timestamp_temps = time();
$temps = date('d/m/Y H:i:s', strtotime($timestamp_temps));

$req = $bdd->prepare('SELECT time FROM date_reunion WHERE identifiant = :identifiant AND time > NOW() ORDER BY time ASC');
$req->execute(['identifiant' => $identifiant]);
$infos = $req->fetch(PDO::FETCH_ASSOC);

$time = $infos['time'];
$last_timestamp = strtotime($time);

$display_date = date('d/m/Y', $last_timestamp);
$display_heure = date('H', $last_timestamp);
$display_minute = date('i', $last_timestamp);

$last_date = "le $display_date a $display_heure h $display_minute";

echo $time;

