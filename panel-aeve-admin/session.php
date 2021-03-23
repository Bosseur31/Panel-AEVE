<?php

session_start();

if (!isset($_SESSION['password_admin'])) {
    $_SESSION['location_admin'] = $location;
    header("Location: password.php");
    exit;
}

$identifiant = $_SESSION['password_admin'];

?>