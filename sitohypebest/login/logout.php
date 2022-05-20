<?php
session_start();
include("connection.php");
session_unset();
session_destroy();
setcookie("idutente","", time()-3600, "/");
unset($_COOKIE['idutente']);
header('location:../index.php');
exit();
?>
