<?php
session_start();
include("login/connection.php");
if (isset($_SESSION["idutente"])) {
    $uploaddir = 'img/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);

    $password = $_POST["password"];
    $username = $_POST["username"];


    // $sql = "select username from utente where username = '$username'";
    // $result = mysqli_query($conn, $sql);
    // if ($result->num_rows > 0) {
    //     $row = $result->fetch_assoc();

    $email = $_POST["email"];
    // $img = $_POST["img"];
    $bio = $_POST["bio"];

    if (isset($password) && $password != "") {
        $sql = $conn->prepare("update utente set password = ? where ID = ?");
        $sql->bind_param("si", md5($password), $_SESSION["idutente"]);
        $sql->execute();
    }

    $sql = $conn->prepare("update utente set email = ?, username = ?, bio = ? where ID = ?");
    $sql->bind_param("sssi", $email, $username, $bio, $_SESSION["idutente"]);
    try {
        $sql->execute();
        if ($uploadfile != $uploaddir) {
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
            $sql = $conn->prepare("update utente set img = ? where ID = ?");
            $sql->bind_param("si", $uploadfile, $_SESSION["idutente"]);
            $sql->execute();
        }
    } catch (Exception $e) {
    }
}
header("location:profilo.php");
?>