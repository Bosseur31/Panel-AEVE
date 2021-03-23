<?php

$index = "index-admin.php";

session_start();

if (!isset($_SESSION['location_admin'])) {
    $_SESSION['location_admin'] = $index;
}

if (isset($_POST['mot_de_passe'])) {

    switch ($_POST['mot_de_passe']) {
        case "demo":
        case "marion":
            $_SESSION['password_admin'] = $_POST['mot_de_passe'];
            echo $_SESSION['location_admin'];
            break;

        default :
            echo 'no';

    }

} else {
    echo 'no';
}



