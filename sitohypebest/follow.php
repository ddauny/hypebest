<?php
session_start();
//cho $_SESSION["idutente"] .  $_GET["idpost"];
include("login/connection.php");
$idseguito = $_GET["idseguito"];
$sql = $conn->prepare("insert into segue (IDSeguace, IDSeguito) values (?,?)");
$sql->bind_param("ii", $_SESSION["idutente"], $idseguito);
$sql->execute();
header("location:profilo.php?idutente=$idseguito");
?>