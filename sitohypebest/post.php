<head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js%22%3E"></script>
    <script src="js/featurePost.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bc3de12e9c.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/featurePost.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>

<?php
session_start();
include("login/connection.php");
if (isset($_SESSION["idutente"])) {
    $idutente = $_SESSION["idutente"];
    $idpost = $_GET["idpost"];

    $sql = "select post.ID as idpost, username, post.img as imgpost, utente.ID as idutente, descrizione from post join utente on post.IDUtente = utente.ID where $idpost = post.ID";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo
        "<div class='card' style='max-width:50%;min-width:460px; margin-left: auto; margin-right: auto;margin-bottom:10px;margin-top:20px'>
                <div class='card-body'>
                    <div class='card-title'><a class='disabledU' href='profilo.php?idutente=$row[idutente]'>$row[username]</a></div> 
                </div>

                <div><img src='$row[imgpost]' class='card-img-top' ></div>  

                <div style='position:relative;margin-top:5px; margin-right:5px' >
                    <div style='float:right;'>
                        <button class='border-0 bg-transparent' onclick='like($row[idpost])'><i id='like$row[idpost]' class='fa-regular fa-heart fa-lg'></i></button>
                        <button class='border-0 bg-transparent' onclick='save($row[idpost])'><i id='save$row[idpost]' class='fa-brands fa-amazon fa-lg'></i></button>
                        <button class='border-0 bg-transparent' onclick='tag($row[idpost])'><i class='fa-regular fa-bookmark fa-lg'></i></button>
                    </div>
                </div>

                <div class='card-body'>
                    <p class='card-text'>$row[descrizione]</p>
                </div>";
        $sqlcommenti = "select testo, data, username, utente.ID as idutente from commenti inner join utente on IDUtente = utente.ID where IDPost = $row[idpost]";
        $resultcommenti = mysqli_query($conn, $sqlcommenti);
        if ($resultcommenti->num_rows > 0) {
            echo "<div>";
            while ($row = $resultcommenti->fetch_assoc()) {
                echo "<div><a id=$row[username] href='profilo.php?idprofilo=$row[idutente]'>$row[username]</a> <label for='$row[username]'>$row[testo]</label> <label>$row[data]</label></div>";
            }
            echo "</div>";
        }
        echo "</div>";
    }
}
?>