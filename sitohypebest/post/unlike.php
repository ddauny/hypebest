<?php
session_start();
//cho $_SESSION["idutente"] .  $_GET["idpost"];
include("../login/connection.php");
$sql = $conn->prepare("delete from likes where IDPost = ? and IDUtente = ?");
$sql->bind_param("ii", $_GET["idpost"], $_SESSION["idutente"]);
$sql->execute();
header("location:../index.php");
?>