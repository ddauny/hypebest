<?php
session_start();
include("connection.php");
if (!isset($_SESSION["idutente"])) {
    $uploaddir = '../img/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);

    $password = $_POST["password"];
    $cognome = $_POST["cognome"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $data = $_POST["data"];
    $sesso = $_POST["sesso"];
    //$img = $_POST["img"];
    $bio = $_POST["bio"];

    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
        $sql = "insert into utente (nome, cognome, email, username, dataNascita, sesso, img, bio, ruolo, password) values ('$nome', '$cognome', '$email', '$username', '$data', '$sesso', '$uploadfile', '$bio', '0', '$password')";
        if ($conn->query($sql) === true) { //ho inserito nel db
            $sql = "select ID from utente where '$username' = username";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            $_SESSION["idutente"] = $row["ID"];
            header("location:../index.php");
        } else {
            header("location:registrazione.html");
        }
    }
}
?>
