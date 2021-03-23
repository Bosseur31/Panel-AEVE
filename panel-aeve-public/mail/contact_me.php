<?php
// Check for empty fields
session_start();

if (empty($_POST['name']) || empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(500);
    exit();
}

$identifiant = $_SESSION['password'];


//mysql toute les variables

try  //test des erreurs mysql
{
    $bdd = new PDO('mysql:host=192.168.1.145;dbname=site;charset=utf8', 'newhouse', 'aymeric54');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->query('SELECT mail FROM infos_enfant WHERE identifiant = :identifiant ');
$req->execute(['identifiant' => $identifiant]);
$infos = $req->fetch(PDO::FETCH_ASSOC);

$mail = $infos['mail'];

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$date = strip_tags(htmlspecialchars($_POST['date']));
$heure = strip_tags(htmlspecialchars($_POST['heure']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "$mail"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "$name vous contacte a propos de votre enfant";
$body = "$name demande depuis le site si votre enfant est libre pour une séance le $date a $heure répondez a l'email : $email.\n\n" . "En detail:\n\nNom: $name\n\nEmail: $email\n\nDate: $date\n\nHeure: $heure\n\nMessage:\n$message";

$header = "From: <noreply@panel-aeve.fr>\n";
$header .= "Reply-To: " . $email . "\n";
$header .= "Content-Type: text/plain; charset=\"utf-8\"";

if (!mail($to, $subject, $body, $header)) {
    http_response_code(500);
} else {
    header("Location: index.php");
}


?>
