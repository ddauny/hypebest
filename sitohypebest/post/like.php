<?php
session_start();
//cho $_SESSION["idutente"] .  $_GET["idpost"];
include("../login/connection.php");
$sql = $conn->prepare("insert into likes (IDUtente, IDPost) values (?,?)");
$sql->bind_param("ii", $_SESSION["idutente"], $_GET["idpost"]);
$sql->execute();
header("location:../index.php");
?>