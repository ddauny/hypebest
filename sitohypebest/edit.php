<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>HypeBest - Edit</title>
    <link rel="stylesheet" href="css/styleRegistrazione.css" type="text/css">
</head>
<?php
session_start();
include('login/connection.php');

if (isset($_SESSION['idutente'])) {
    $sql = "select * from utente where ID = $_SESSION[idutente]";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo " <div class='container-fluid'>
        <div class=''>
            <form id='form' action='chkEdit.php' enctype='multipart/form-data' method='post'>
                <div class='container'>
    <form action='chkEdit.php' enctype='multipart/form-data' method='post'>

    <label for='email'><b>Email</b></label>
    <input type='email' placeholder='Email' id='email' name='email' value=$row[email] required>

    <label for='username'><b>Username</b></label>
    <input type='text' placeholder='Username' id='username' name='username' value=$row[username] required>

    <label for='password'><b>Password</b></label>
    <input type='password' placeholder='Password' id='password' name='password'>

    <label for='img'><b>Immagine profilo</b></label>
    <input name='img' id='img' type='file' value=$row[img]/>

    <label for='bio'><b>Biografia</b></label>
    <input type='text' id='bio' name='bio' value='$row[bio]' required> 
    <br><button onclick='submit()'><b>Modifica</b></button><br>
    </form>
    </div>
</div></div>";
    } else {
        header("location:profilo.php?idutente=$_SESSION[idutente]");
    }
}
?>