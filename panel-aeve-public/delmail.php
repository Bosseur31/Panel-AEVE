<?php

$location = "delmail.php";

include('session.php');

if(empty($_POST['delmail']) || !filter_var($_POST['delmail'], FILTER_VALIDATE_EMAIL)) {
  echo "Email invalide";
  exit();
}

$table = 'mail_'.$identifiant.'';
$mail = $_POST['delmail'];

include('mysql.php');

           $req = $bdd->prepare('DELETE FROM '.$table.' WHERE mail = :mail') or die(print_r($bdd->errorInfo()));
           $req->execute(['mail' => $mail]);

echo "Email $mail supprimé avec succés";

?>