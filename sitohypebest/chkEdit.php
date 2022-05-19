<?php
session_start();
include("login/connection.php");
if (isset($_SESSION["idutente"])) { 
    $uploaddir = 'img/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);

    $password = $_POST["password"];
    $username = $_POST["username"];
    $email = $_POST["email"];
   // $img = $_POST["img"];
    $bio = $_POST["bio"];

    if(isset($password) && $password != ""){
        $sql = $conn->prepare("update utente set password = ? where ID = ?");
        $sql->bind_param("si", md5($password), $_SESSION["idutente"]);
        $sql->execute();
    }

    $sql = $conn->prepare("update utente set email = ?, username = ?, bio = ? where ID = ?");
    $sql->bind_param("sssi", $email, $username, $bio, $_SESSION["idutente"]);
    $sql->execute();

    if($uploadfile != $uploaddir){
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
        $sql = $conn->prepare("update utente set img = ? where ID = ?");
        $sql->bind_param("si", $uploadfile, $_SESSION["idutente"]);
        $sql->execute();
    }
}
header("location:profilo.php");
?>
