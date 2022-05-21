<?php
session_start();
include("login/connection.php");

$situazione = $_POST["situazione"];
$descrizione = $_POST["descrizione"];
$sesso = $_POST["sesso"];



$uploaddir = 'img/';
$uploadfile = $uploaddir . basename($_FILES['img']['name']);
move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);


$sql = $conn->prepare("INSERT INTO post (IDUtente, situazione, descrizione, sesso, img) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("issis", $_SESSION["idutente"], $situazione, $descrizione, $sesso, $uploadfile);


if ($sql->execute() === TRUE) {

    header("location:index.php");
} else {
    header("location:AddPost.html");
}
$sql->close();
$conn->close();
