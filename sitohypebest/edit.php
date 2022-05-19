
<?php
session_start();
include('login/connection.php');

if (isset($_SESSION['idutente'])) {
    $sql = "select * from utente where ID = $_SESSION[idutente]";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "
    <form action='chkEdit.php' enctype='multipart/form-data' method='post'>

    <label for='email'>Email</label>
    <input type='email' placeholder='Email' id='email' name='email' value=$row[email] required>

    <label for='username'>Username</label>
    <input type='text' placeholder='Username' id='username' name='username' value=$row[username] required>

    <label for='password'>Password</label>
    <input type='password' placeholder='Password' id='password' name='password'>

    <label for='img'>Immagine profilo</label>
    <input name='img' id='img' type='file' value=$row[img]/>

    <label for='bio'>Biografia</label>
    <input type='text' id='bio' name='bio' value='$row[bio]' required> 
    <input type='submit' value='Modifica'>
    </form>";
    } else {
        header("location:profilo.php?idutente=$_SESSION[idutente]");
    }
}
?>

