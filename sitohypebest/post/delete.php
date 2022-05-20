<?php
session_start();
//cho $_SESSION["idutente"] .  $_GET["idpost"];
include("../login/connection.php");
$sql = $conn->prepare("update post set pubblicato = ? where ID = ?");
$id =  $_GET["idpost"];
$zero = 0;
$sql->bind_param("ii", $zero, $id);
$sql->execute();
header("location:../profilo.php");
?>