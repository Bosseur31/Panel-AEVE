<?php

try  //test des erreurs mysql
{
    $bdd = new PDO('mysql:host=192.168.1.145;dbname=site;charset=utf8', 'newhouse_admin', 'aymeric54');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT * FROM infos_enfant WHERE identifiant = :identifiant');
$req->execute(['identifiant' => $identifiant]);
$infos = $req->fetch(PDO::FETCH_ASSOC);

$mail = $infos['mail'];
$prenom = $infos['prenom'];
$nom = $infos['nom'];
$domaine = $infos['nom_domaine'];
$ville = $infos['ville'];
$postal = $infos['code_postal'];
$facebook = $infos['facebook'];
$insta = $infos['instagram'];
$salle_jeux = $infos['lien_salle_jeux'];
$quotidien = $infos['lien_quotidien'];
$reunion = $infos['lien_reunion'];
$archive = $infos['lien_archive'];

?>
