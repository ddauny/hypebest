<!DOCTYPE html>
<html lang="en">


<head>
    <title>HypeBest - Aggiungi Post</title>
    <link rel="stylesheet" href="../css/styleLogin.css" type="text/css">
    <link rel="stylesheet" href="css/styleAddPost.css" type="text/css">
</head>


<body>
    <form action="chkAddPost.php" enctype="multipart/form-data" method="post">
        <div class="container">
           
            <label for="descrizione">Descrizione</label>
            <input type="text" placeholder="Descrizione" id="descrizione" name="descrizione" required>

            <label for="sesso">Sesso</label><br>
            <select id="sesso" name="sesso" required>
                <option value=0>Maschio</option>
                <option value=1>Femmina</option>
                <option value=2>Preferisco non specificare</option>
            </select>

            <br><label for="img">Immagine</label>
            <input name="img" id="img" type="file" required />

            <br><label for="interesse">Situazione</label><br>
            <?php
            session_start();
            include("login/connection.php");
            $sql = "select * from interesse";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                echo "<select name='interesse' id='interesse' required>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=$row[ID]>$row[interesse]</option>";
                }
                echo "</select><br>";
            }
            ?>

            <br><input type="submit" value="Aggiungi Post">
        </div>
    </form>
</body>

</html>