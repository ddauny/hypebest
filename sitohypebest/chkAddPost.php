<?php
session_start();
include("login/connection.php");

$situazione = $_POST["interesse"];
$descrizione = $_POST["descrizione"];
$sesso = $_POST["sesso"];


$sql = $conn->prepare("INSERT INTO tag (link, tipo, nome) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("sis", $tag, $situazione, $descrizione, $sesso, $uploadfile);



$tags = $_POST['tag'];
$nametags = $_POST['nametag'];
$atags = array();
$ntags = array();
foreach ($tags as $tag) {
    array_push($atags, $tag);
}
foreach ($nametags as $nametag) {
    array_push($ntags, $nametag);
}
for ($i = 0; $i < count($atags); $i++) {
}



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
