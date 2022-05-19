<head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js%22%3E"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
session_start();
include("login/connection.php");
$sql = "select post.ID as idpost, username, post.img as imgpost, utente.ID as idutente, descrizione from post join segue on IDSeguace = $_SESSION[idutente] join utente on IDSeguito = utente.ID where pubblicato = 1 order by post.ID asc";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo
        "<div>
            <div><a href='profilo.php?idutente=$row[idutente]'>$row[username]</a></div> 
            <div><img src='$row[imgpost]'></div>  
            <div>
                <div><button onclick='like($row[idpost])'><i class='fa fa-light fa-heart'></i></button>
                <button onclick='save($row[idpost])'><i id='save' class='fa fa-thin fa-shoe-prints'></i></button>
                <button onclick='tag($row[idpost])'><i class='fa fa-bookmark'></i></button>
                </div>
            </div>
            <div><label>$row[descrizione]</label></div>";
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
<script>

    function like(id){
        window.location = "like.php?idpost=" + id;
        // $.ajax({
        //         url: "like.php?idpost=" + id,
        //         success: function() {
        //             $("#like").removeClass("fa-light");
        //             $("#like").addClass("fa-solid");
        //         }
        //     });
    }

    function save(id){
        window.location = "save.php?idpost=" + id;
        // $.ajax({
        //         url: "save.php?idpost=" + id,
        //         success: function(data) {
        //             $("#save").removeClass("fa-thin");
        //             $("#save").addClass("fa-solid");
        //         }
        //     });
    }


    //da capire cosa fare
    function tag(id){
        window.location = "tag.php?idpost=" + id;
        // $.ajax({
        //         url: "tag.php?idpost=" + id,
        //         success: function(data) {
        //             $("#save").removeClass("fa-thin");
        //             $("#save").addClass("fa-solid");
        //         }
        //     });
    }

</script>