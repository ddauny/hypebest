<!DOCTYPE html>
<html lang="en">

<head>
    <title>HypeBest - Registrazione</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="../css/styleRegistrazione.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function submit() {
            $('#form').submit();

        }
    </script>
</head>

<body>
    <br>

    <div class="container-fluid">
        <div class="">
            <form id="form" action="chkRegistrazione.php" enctype="multipart/form-data" method="post">
                <div class="container">

                    <label for="nome"><b>Nome</b></label>
                    <input type="text" placeholder="Nome" id="nome" name="nome" required>

                    <label for="cognome"><b>Cognome</b></label>
                    <input type="text" placeholder="Cognome" id="cognome" name="cognome" required>

                    <label for="email"><b>Email</b></label><br>
                    <input type="email" placeholder="Email" id="email" name="email" required>

                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Username" id="username" name="username" required>


                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Password" id="password" name="password" required>

                    <label for="data"><b>Data di nascita</b></label>
                    <input type="date" id="data" name="data" value="2000-01-01" min="1920-01-01" required>

                    <label for="sesso"><b>Sesso</b></label>
                    <select id="sesso" name="sesso" required>
                        <option value=0>Maschio</option>
                        <option value=1>Femmina</option>
                        <option value=2>Preferisco non specificare</option>
                    </select>

                    <label for="interesse"><b>Interesse</b></label><br>
                    <?php
                    session_start();
                    include("connection.php");
                    $sql = "select * from interesse";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                        echo "<select name='interesse' id='interesse'>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=$row[ID]>$row[interesse]</option>";
                        }
                        echo "</select><br>";
                    }
                    ?>

                    <label for="bio"><b>Biografia</b></label>
                    <input type="text" id="bio" name="bio" required>

                    <label for="img"><b>Immagine profilo</b></label>
                    <input name="img" id="img" type="file" required/><br>

                    <br><button type="submit" onclick="submit()"><b>Registrati</b></button><br>
                    <br><button type="reset" value="Cancella" class="cancelbtn"><b>Cancella Tutto</b></button>
                    <br><br><span class="password"><b>Hai già un account? <a href="login.html">Accedi<a></b></span>
                </div>
            </form>
            
        </div>
    </div>
</body>

</html>