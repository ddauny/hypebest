
<?php
session_start();
include('login/connection.php');

if (isset($_SESSION['idutente'])) {
    $sql = 'select * from utente where ID = $_SESSION[idutente]';
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "
    <form action='chkEdit.php' enctype='multipart/form-data' method='post'>

    <label for='nome'>Nome</label>
    <input type='text' placeholder='Nome' id='nome' name='nome' value=$row[nome]   required>

    <label for='cognome'>Cognome</label>
    <input type='text' placeholder='Cognome' id='cognome' name='cognome' value=$row[cognome] required>

    <label for='email'>Email</label>
    <input type='email' placeholder='Email' id='email' name='email' value=$row[email] required>

    <label for='username'>Username</label>
    <input type='text' placeholder='Username' id='username' name='username' value=$row[username] required>


    <label for='password'>Password</label>
    <input type='password' placeholder='Password' id='password' name='password' required>

    <label for='data'>Data di nascita</label>
    <input type='date' id='data' name='data' value=$row[data] min='1920-01-01' requirad>

    <label for='sesso'>Sesso</label>
    <select id='sesso' name='sesso' value=$row[sesso] required>
        <option value=0>Maschio</option>
        <option value=1>Femmina</option>
        <option value=2>Preferisco non specificare</option>
    </select>

    <label for='img'>Immagine profilo</label>
    <input name='img' id='img' type='file' value=$row[img] required/>

    <label for='bio'>Biografia</label>
    <input type='text' id='bio' name='bio' value=$row[bio] requirad> 
    </form>";
    } else {
        header('location"login.html');
    }
}
?>

