<?php
session_start();
//cho $_SESSION["idutente"] .  $_GET["idpost"];
include("login/connection.php");
$idseguito = $_GET["idseguito"];
$sql = $conn->prepare("delete from segue where IDSeguito = ? and IDSeguace = ?");
$sql->bind_param("ii", $idseguito, $_SESSION["idutente"]);
$sql->execute();
header("location:profilo.php?idutente=$idseguito");
?>