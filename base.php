<?php

session_start();

if (isset($_SESSION['password'])) {
    header("Location: panel-aeve-public/index.php");
    exit;
} else if (isset($_SESSION['password_admin'])) {
    header("Location: panel-aeve-admin/index-admin.php");
    exit;
} else {
    header("Location: panel-aeve-public/password.php");
    exit;
}


