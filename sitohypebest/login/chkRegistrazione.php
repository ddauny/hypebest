<?php
session_start();
include("connection.php");
if (!isset($_SESSION["idutente"])) {
    $uploaddir = '../img/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);
    $upv = 'img/';
    $up = $upv . basename($_FILES['img']['name']);

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
        $sql = $conn->prepare("insert into utente (nome, cognome, email, username, dataNascita, sesso, img, bio, ruolo, password) values (?,?,?,?,?,?,?,?,?,?)");
        $zero = 0;
        $sql->bind_param("sssssissis", $nome, $cognome, $email, $username, $data, $sesso, $up, $bio, $zero, $password);
        try {
            if ($sql->execute() === true) { //ho inserito nel db
                $sql = $conn->prepare("select ID from utente where ? = username");
                $sql->bind_param("s", $username);
                $sql->execute();
                $result = $sql->get_result();
                $row = $result->fetch_assoc();
                $_SESSION["idutente"] = $row["ID"];
                echo "cvwopdvcwp";
                $sql = "insert into possiede (IDInteresse, IDUtente) values ('$interesse', '$_SESSION[idutente]')";
                $conn->query($sql);
                header("location:../index.php");
            } else {
                header("location:registrazione.php");
            }
        } catch (Exception $e) {
            header("location:registrazione.php");
        }
    } else {
        header("location:registrazione.php");
    }
} else {
    header("location:../home.php");
}
?>