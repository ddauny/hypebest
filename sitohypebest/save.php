<?php
session_start();
include("login/connection.php");
$sql = "insert into salva (IDPost, IDUtente) values ($_GET[idpost], $_SESSION[idutente])";
$result = mysqli_query($conn, $sql);
?>