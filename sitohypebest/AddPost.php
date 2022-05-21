<!DOCTYPE html>
<html lang="en">


<head>
    <title>HypeBest - Add Post</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="css/styleAddPost.css" type="text/css">
    <script src="js/addTag.js"></script>


    <script src="https://kit.fontawesome.com/bc3de12e9c.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">


</head>


<body>
    <?php
    session_start();
    include("login/connection.php");
    include("navBar.php")
    ?>
    <div class="container-fluid">
        <div class="">
            <form action="chkAddPost.php" enctype="multipart/form-data" method="post">
                <div class="container">

                    <label for="descrizione"><b>Descrizione<b></label>
                    <input type="text" placeholder="Descrizione" id="descrizione" name="descrizione" required>

                    <label for="sesso"><b>Sesso<b></label><br>
                    <select id="sesso" name="sesso" required>
                        <option value=0>Maschio</option>
                        <option value=1>Femmina</option>
                        <option value=2>Preferisco non specificare</option>
                    </select>

                    <br><label for="img"><b>Immagine<b></label>
                    <input name="img" id="img" type="file" required />

                    <br><label for="interesse"><b>Situazione</b></label><br>
                    <?php
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

                    <div class="input-group">
                    <span class="input-group">Tag e nome tag</span>
                    <input type="text" placeholder="@utente o link prodotto" id="tag" name="tag" class="form-control">
                    <input type="text" placeholder="nome da visualizzare" id="nometag" name="nometag" class="form-control">

                    <div class="input-group">
                    <input type="text" placeholder="@utente o link prodotto" id="tag" name="tag" class="form-control">
                    <input type="text" placeholder="nome da visualizzare" id="nometag" name="nometag" class="form-control">
                    </div>

                    <!-- <label for="tag"><b>Tag<b></label>
                    <input type="text" placeholder="@utente o link prodotto" id="tag" name="tag">
                    <label for="nometag"><b>Nome Tag<b></label>
                    <input type="text" placeholder="@utente o link prodotto" id="nometag" name="nometag"> -->
                    <button onclick='addTag()'><b>Tag</b></button>

                    <br><button onclick="submit()"><b>Aggiungi Post</b></button><br>

                </div>


            </form>
        </div>
    </div>
</body>

</html>