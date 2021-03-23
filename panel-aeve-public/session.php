<?php
session_start();

if (!isset($_SESSION['password'])) { $_SESSION['location'] = $location; header("Location: password.php"); EXIT; }

$identifiant = $_SESSION['password'];

?>