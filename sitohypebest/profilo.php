<head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js%22%3E"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
session_start();
include("login/connection.php");
if (isset($_SESSION["idutente"])) {
    if (isset($_GET["idutente"])) {
        $idutente = $_GET["idutente"];
    } else {
        $idutente = $_SESSION["idutente"];
    }

    $sqlutente = "select * from utente where ID = $idutente";
    $resultutente = mysqli_query($conn, $sqlutente);
    $rowutente = $resultutente->fetch_assoc();

    $sqlpost = "select * from post where IDUtente = $idutente";
    $resultpost = mysqli_query($conn, $sqlpost);

    $sqlnpost = "select count(*) from post where IDUtente = $idutente";
    $resultnpost = mysqli_query($conn, $sqlnpost);
    $rpost = $resultnpost->fetch_assoc();
    $npost = $rpost["count(*)"]; //npost è il numero dei post dell'utente

    $sqlnfollower = "select count(*) from segue where IDSeguito = $idutente";
    $resultnfollower = mysqli_query($conn, $sqlnfollower);
    $rfollower = $resultnfollower->fetch_assoc();
    $nfollower = $rfollower["count(*)"]; //nlike è il numero di like totali dell'utente

    $sqlnsave = "select count(*) from likes where IDUtente = $idutente";
    $resultnsave = mysqli_query($conn, $sqlnsave);
    $rsave = $resultnsave->fetch_assoc();
    $nsave = $rsave["count(*)"]; //nsave è il numero di salvataggi dei post dell'utente


    echo "<div>
            <div><img src='$rowutente[img]'></div>
            <div>$rowutente[username]</div>
            <div>$rowutente[bio]</div>
            <div><div>n° followers $nfollower</div><div>n° post $npost</div><div>n° salvataggi $nsave</div><div>";
    if ($idutente != $_SESSION["idutente"]) { //se l'utente che guarda il profilo non è se stesso

        $sql = "select ID from segue where IDSeguito = $idutente and IDSeguace = $_SESSION[idutente]";
        $r = mysqli_query($conn, $sql);
        if ($r->num_rows > 0) { //vuol dire che già segue
            echo "<button onclick='unfollow($idutente)'>SMETTI DI SEGUIRE</button>";
        } else {
            echo "<button onclick='follow($idutente)'>SEGUI</button>";
        }
    } else {
        echo "<button onclick='edit($idutente)'>MODIFICA</button><button onclick='logout()'>ESCI</button>";
    }
    echo  "</div></div></div>";

    //COMINCIA VISUALIZZAZIONE DEI POST
    if ($resultpost->num_rows > 0) { //se ho almeno un post
        echo "<div>";
        while ($post = $resultpost->fetch_assoc()) {
            echo "<div><a href='post.php?idpost=$post[ID]'><img src='$post[img]'></a></div>";
        }
        echo "</div>";
    }
    echo "</div>";
}
?>

<script>
    function follow(id) {
        window.location = "follow.php?idseguito=" + id;
    }

    function unfollow(id) {
        window.location = "unfollow.php?idseguito=" + id;
    }

    function edit(id) {
        window.location = "edit.php";
    }

    function logout(){
        window.location = "login/logout.php";
    }
</script>