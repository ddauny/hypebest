<?php

session_start();
include('login/connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HypeBest - Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="description" content="">

    <link rel="stylesheet" href="css/styleRegistrazione.css" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->


    <script src="https://kit.fontawesome.com/bc3de12e9c.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>

<body>

    <?php

    include("navBar.php");

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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>