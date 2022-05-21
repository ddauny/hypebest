<?php 
$tag = $_POST["tag"];
$nometag = $_POST["nometag"];
//$immagine = $_POST["img"];
$idtaggato = null;
if (isset($tag) && $tag != "") {
    if (substr($tag, 0) == "@") { //sto taggando un utente
        $tag = substr($tag, 1, strlen($tag) - 1);
        $sql = "select ID from utente where username = $tag";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) { // se l'utente esiste
            $row = $result->fetch_assoc();
            $idtaggato = $row["ID"];
        }
    }
}
