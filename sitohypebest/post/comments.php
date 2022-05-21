<?php
session_start();
//cho $_SESSION["idutente"] .  $_GET["idpost"];
include("../login/connection.php");
$testo = $_POST["commento"];
$sql = $conn->prepare("insert into commenti (IDUtente, IDPost, testo) values (?,?,?)");
$sql->bind_param("iis", $_SESSION["idutente"], $_GET["idpost"], $testo);
$sql->execute();
header("location:../index.php");
?>