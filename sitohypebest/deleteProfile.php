<?php

session_start();
//cho $_SESSION["idutente"] .  $_GET["idpost"];
include("login/connection.php");
if (isset($_SESSION["idutente"])) {
    $sql = $conn->prepare("delete from utente where ID = ?");
    $sql->bind_param("i", $_SESSION["idutente"]);
    $sql->execute();
    header("location:login/logout.php");
} else {
    header("location:index.php");
}
