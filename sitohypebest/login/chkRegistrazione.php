<?php
session_start();
include("connection.php");
if (!isset($_SESSION["idutente"])) {
    $uploaddir = '../img/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);
    $upv = 'img/';
    $up = $upv .basename($_FILES['img']['name']);

    $password = $_POST["password"];
    $cognome = $_POST["cognome"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $data = $_POST["data"];
    $sesso = $_POST["sesso"];
    $interesse = $_POST["interesse"];
    //$img = $_POST["img"];
    $bio = $_POST["bio"];

    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
        $password = md5($password);
        $sql = "insert into utente (nome, cognome, email, username, dataNascita, sesso, img, bio, ruolo, password) values ('$nome', '$cognome', '$email', '$username', '$data', '$sesso', '$up', '$bio', '0', '$password')";
        if ($conn->query($sql) === true) { //ho inserito nel db
            $sql = "select ID from utente where '$username' = username";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            $_SESSION["idutente"] = $row["ID"];
            echo "cvwopdvcwp";
            $sql = "insert into possiede (IDInteresse, IDUtente) values ('$interesse', '$_SESSION[idutente]')";
            $conn->query($sql);
            header("location:../index.php");
        } else {
            header("location:registrazione.php");
        }
    }
} else {
    header("location:../home.php");
}
?>
