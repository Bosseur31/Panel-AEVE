<?php

$index = "index.php";

session_start();

if (!isset($_SESSION['location']))
	{ $_SESSION['location'] = $index; }

if (isset($_POST['mot_de_passe']))  {

switch ($_POST['mot_de_passe']) // test de tout les mots de passe (test avec mysql a a envisager)
    {
    case "demo":
    case "marion":
        $_SESSION['password'] = $_POST['mot_de_passe']; echo $_SESSION['location'];
        break;

    default :
        echo 'no';

}

}
else { echo 'no'; }





