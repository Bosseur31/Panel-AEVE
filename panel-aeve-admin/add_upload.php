<?php

$location = 'add_upload.php';

include('session.php');
include('mysql.php');

if (empty($_POST['date'])) {
    echo "<div class='alert alert-danger' role='alert'>
    Veuiller entrer une date
        </div>";

    exit();
}

$extensions = array('.pdf', '.docx', '.doc', '.odt');
$extension = strrchr($_FILES['reunion']['name'], '.');

if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
    echo "<div class='alert alert-danger' role='alert'>
        Vous devez uploader un fichier de type pdf, docx, odt ou doc...
        </div>";
    exit();
}

if (isset($_FILES['reunion'])) {
    $information = $_POST['type_cr'];
    $sendmail = $_POST['sendmail'];
    $date_temp = $_POST['date'];
    $date = date('d/m/Y', strtotime($date_temp));
    $dossier = '/srv/web/panel-aeve/data/cr_reunion/';
    $fichier = basename($_FILES['reunion']['name']);
    if (move_uploaded_file($_FILES['reunion']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {

        $req = $bdd->prepare('INSERT INTO site.cr_reunion(identifiant, date_r, infos, emplacement ) VALUES(:identifiant, :date_r, :information, :emplacement)') or die(print_r($bdd->errorInfo()));
        $req->execute(array(
            'date_r' => $date,
            'information' => $information,
            'emplacement' => $fichier,
            'identifiant' => $identifiant,
        ));

        echo "<div class='alert alert-success' role='alert'>
        Le fichier " . $fichier . " a etait uploadé avec succés ! Comme une " . $information . " du " . $date . " !
        </div>";

    }

    if ($sendmail == "mailon") {

        $table = 'mail_' . $identifiant . '';
        $reponse = $bdd->query('SELECT mail FROM site.mail WHERE identifiant = "' . $identifiant . '"');
        while ($donnees = $reponse->fetch()) {
            // Create the email and send the message
            $to = $donnees['mail']; //Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
            $subject = "Nouveau compte rendu de reunion en ligne";
            $body = '';
            $body .= '<h1 style="text-align:center"> Compte rendu réunion </h1> ';
            $body .= '<br><br><br><div style="text-align:center"><strong>Le compte rendu de la réunion de ' . $date . ' est maintenent disponible sur https://panel.aymeric-mai.fr</strong></div>';
            $body .= '<br><br><br><br><br><br><div style="text-align:center"><!--[if mso]>
  <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://www.demo.aymeric-mai.fr/panel-aeve-public/compte_rendu.php" style="height:40px;v-text-anchor:middle;width:200px;" arcsize="33%" strokecolor="#000000" fillcolor="#0c79ed">
    <w:anchorlock/>
    <center style="color:#ffffff;font-family:sans-serif;font-size:13px;font-weight:bold;">Compte Rendu</center>
  </v:roundrect>
<![endif]--><a href="https://www.demo.aymeric-mai.fr/panel-aeve-public/compte_rendu.php"
style="background-color:#0c79ed;border:1px solid #000000;border-radius:13px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:40px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;">Compte Rendu</a></div>';

            $body .= '<br><br><p style="text-align:center" >Si le bouton ne fonctionne pas cliquer <a href="https://www.demo.aymeric-mai.fr/panel-aeve-public/compte_rendu.php">ICI</a></p>';


            $header = 'From: Compte Rendu ' . $prenom . '<info@' . $domaine . '>' . "\n";
            $header .= 'Reply-To: <' . $mail . '>\n';
            $header .= 'MIME-Version: 1.0' . "\r\n";
            $header .= "Content-Type: text/html; charset=\"utf-8\"";

            mail($to, $subject, $body, $header);


        }
    }// Termine le traitement de la requête
} else {
    echo "<div class='alert alert-danger' role='alert'>
    Une erreur est survenu, le fichier n'a pas était uploadé !
        </div>";
}
