
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>HypeBest - Saves</title>
    <script src="js/tag.js"></script>
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
    <link href="css/tag.css" rel="stylesheet">
    <style>
        .redIcon{
            color:red;
        }
        .blacIcon{
            color:black;
        }
    </style>
</head>


<?php 
session_start();
include("login/connection.php");
include("navBar.php");
if (isset($_SESSION["idutente"])) {
    $sql = "select post.ID as idpost, username, post.img as imgpost, utente.ID as idutente, descrizione, utente.img as imgutente from post join utente on post.IDUtente = utente.ID join salva on salva.IDPost = post.ID where 4 = salva.IDUtente and pubblicato = 1 order by salva.ID asc";
    
    
    
    $result = mysqli_query($conn, $sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card' style='max-width:50%;min-width:460px; margin-left: auto; margin-right: auto;margin-bottom:10px;margin-top:20px'>
        <div style='margin-left: 6px;margin-top:6px'>
            <div class='card-title'>
            <img src='$row[imgutente]' class='card-img-top' style='width:40px;height:40px; border-radius:80%;'>
            <a class='disabledU' style='font-weight:bold;margin-left:5px' href='profilo.php?idutente=$row[idutente]'>$row[username]</a></div> 
        </div>
        <div><img src='$row[imgpost]' class='card-img-top' ></div> ";
            $sqllike = "select * from likes where IDPost = $row[idpost] and IDUtente = $_SESSION[idutente]";
            $resultlike = mysqli_query($conn, $sqllike);
            $liked = 0;
            $classlike = "fa-regular";
            if ($resultlike->num_rows > 0) {
                $liked = true;
                $classlike = "fa-solid redIcon";
            }
            $sqllike = "select * from salva where IDPost = $row[idpost] and IDUtente = $_SESSION[idutente]";
            $resultlike = mysqli_query($conn, $sqllike);
            $saved = 0;
            $classsave = "blackIcon";
            if ($resultlike->num_rows > 0) {
                $saved = true;
                $classsave = "redIcon";
            }
            echo "<div style='position:relative;margin-top:5px; margin-right:5px' ><div style='float:right;'>
                <button class='border-0 bg-transparent' onclick='like($row[idpost],$liked)'><i id='like$row[idpost]' class='$classlike fa-heart fa-lg'></i></button>
                <button class='border-0 bg-transparent' onclick='save($row[idpost],$saved)'><i id='save$row[idpost]' class='fa $classsave fa-shirt fa-lg'></i></button>
                <div class='popup' onclick='popup()'><i style='margin-left:4px' class='fa fa-regular fa-tag fa-lg'></i>
                    <span class='popuptext' id='myPopup'>";
            $sqltag = "select link, tipo, nome from tag join presenta on tag.ID = presenta.IDTag where presenta.IDPost = $row[idpost]";
            $resulttag = mysqli_query($conn, $sqltag);
            if ($resulttag->num_rows > 0) {
                while ($rowtag = $resulttag->fetch_assoc()) {
                    if ($rowtag["tipo"] == "profilo") { //se 0 è un tag utente
                        // echo $rowtag["link"];
                        $sqlutente = "select ID from utente where username = '$rowtag[link]'";
                        $resultutente = mysqli_query($conn, $sqlutente);
                        if ($resultutente->num_rows > 0) {
                            $rowutente = $resultutente->fetch_assoc();
                            $utentetaggato = $rowutente["ID"];
                        }
                        echo "<a class='disabledU' style='font-weight:bold'  href='profilo.php?idutente=$utentetaggato'>$rowtag[link]</a>";
                    } else { //sto taggando un articolo
                        echo "<a  class='disabledU' style='font-weight:bold'  href='$rowtag[link]'>$rowtag[nome]</a>";
                    }
                    echo "<br>";
                }
            }
            echo "</span></div></div></div><div class='card-body'>
            <p class='card-text'><a class='disabledU' style='font-weight:bold;margin-left:0px' href='profilo.php?idutente=$row[idutente]'>$row[username] </a> $row[descrizione]</p>";
            $sqlcommenti = "select testo, data, username, utente.ID as idutente from commenti inner join utente on IDUtente = utente.ID where IDPost = $row[idpost]";
            $resultcommenti = mysqli_query($conn, $sqlcommenti);
            if ($resultcommenti->num_rows > 0) {
                echo "<p>Commenti:</p>";
                while ($row = $resultcommenti->fetch_assoc()) {
                    echo "<div class='card-text'><a class='disabledU' style='font-weight:bold;margin-left:0px' href='profilo.php?idutente=$row[idutente]'>$row[username]</a> <label for='$row[username]'>$row[testo]</label> <label>$row[data]</label></div>";
                }
            }
            echo "</div></div>";
        }
    } else {
        header("location:index.php");
    }
} else {
    header("location:index.php");
}
?>
