<?php
session_start();
include("login/connection.php");
if(isset($_SESSION["idutente"])){
    header("location:home.php");
} else if(isset($_COOKIE["idutente"])) {
    $_SESSION["idutente"] = $_COOKIE["idutente"];
    header("location:home.php");
} else {
    header("location:login/login.html");
}
?>