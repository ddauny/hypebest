<?php
session_start();
include("connection.php");
$user = $_POST["username"];
$pass = md5($_POST["password"]);
$sql = $conn->prepare("select ID, nome, ruolo from utente where password = ? and username = ?");
$sql->bind_param("ss", $pass, $user);
$sql->execute();
$result = $sql->get_result();
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $_SESSION["idutente"] = $row["ID"];
    $_SESSION["nomeutente"] = $row["nome"];
    if($row["ruolo"] == 1) $_SESSION["admin"] = 1;
    setcookie("idutente", $_SESSION["idutente"], time() + (86400 * 30), "/"); // 86400 = 1 day  
    header("location:../index.php");
} else {
    header("location:login.html");
}
?>
