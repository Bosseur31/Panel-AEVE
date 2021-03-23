<?php

$location = 'date.php';

include('session.php');
include('mysql.php');

$temps = time();

$req = $bdd->prepare('SELECT time FROM date_reunion WHERE identifiant = :identifiant AND time > NOW() ORDER BY time ASC');
$req->execute(['identifiant' => $identifiant]);
$infos = $req->fetch(PDO::FETCH_ASSOC);

$last_timestamp = $infos['time'];

$display_date = date('d/m/Y', strtotime($last_timestamp));
$display_heure = date('H', strtotime($last_timestamp));
$display_minute = date('i', strtotime($last_timestamp));

$last_date = "le $display_date a $display_heure h $display_minute ";
