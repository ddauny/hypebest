<?php
session_start();
include("sessioni.php");
include("connection.php");

$situazione = $_POST["situazione"];
$descrizione = $_POST["descrizione"];
$sesso = $_POST["sesso"];
$immagine = $_POST["img"];


$uploaddir = 'imgPost/';     
$uploadfile = $uploaddir . basename($_FILES['img']['name']);   
move_uploaded_file( $_FILES['img']['tmp_name'],$uploadfile);


$sql = $conn->prepare("INSERT INTO post (situazione, descrizione, sesso, immagine) VALUES (?, ?, ?, ?)");
$sql->bind_param("ssis", $situazione, $descrizione, $sesso, $uploadfile);

if ($sql->execute() === TRUE) {
    header("location:index.php");
} else {
    header("location:aggiungiPost.php?msg=Errore nell'inserimento dati");
}
$sql->close();
$conn->close();