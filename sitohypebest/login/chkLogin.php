<?php
session_start();
include("connection.php");
$user = $_POST["username"];
$pass = md5($_POST["password"]);
$sql = "select ID, nome, ruolo from utente where password = '$pass' and username = '$user'";
$result = mysqli_query($conn, $sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $_SESSION["idutente"] = $row["ID"];
    $_SESSION["nomeutente"] = $row["nome"];
    if($row["ruolo"] == 1) $_SESSION["admin"] = 1;
    
  
    header("location:../index.php");
} else {
    header("location:login.html");
}
?>
