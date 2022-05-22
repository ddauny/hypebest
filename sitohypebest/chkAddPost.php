<?php
session_start();
include("login/connection.php");

$situazione = $_POST["interesse"];
$descrizione = $_POST["descrizione"];
$sesso = $_POST["sesso"];


$uploaddir = 'img/';
$uploadfile = $uploaddir . basename($_FILES['img']['name']);
if ($uploadfile != $uploaddir) {
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);


    $sql = $conn->prepare("INSERT INTO post (IDUtente, situazione, descrizione, sesso, img) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("issis", $_SESSION["idutente"], $situazione, $descrizione, $sesso, $uploadfile);


    if ($sql->execute() === TRUE) {
        $nametags = $_POST['nometag'];
        $tags = $_POST['tag'];
        //   echo $nametags;
        if (isset($nametags)) {
            $arraytag = array(); //array dei tag
            foreach ($tags as $tag) {
                array_push($arraytag, $tag);
            }
            if (count($arraytag) > 0) {
                $sql = "select max(ID) from post";
                $result = mysqli_query($conn, $sql);
                $row = $result->fetch_assoc();
                $lastidpost = $row["max(ID)"];
                $arraynome = array();
                foreach ($nametags as $nametag) {
                    array_push($arraynome, $nametag);
                }
                for ($i = 0; $i < count($arraytag); $i++) {
                    $sql = $conn->prepare("INSERT INTO tag (link, tipo, nome) VALUES (?, ?, ?)");
                    $tipo = "articolo";
                    if (substr($arraytag[$i], 0, 1) == "@") {
                        $tipo = "profilo";
                    }
                    $sql->bind_param("sss", substr($arraytag[$i], 1, strlen($arraytag[$i]) - 1), $tipo, $arraynome[$i]);
                    $sql->execute();
                    $lastidtag = $sql->insert_id;
                    $sql = $conn->prepare("INSERT INTO presenta (IDPost, IDTag) VALUES (?, ?)");
                    echo $lastidpost, $lastidtag;
                    $sql->bind_param("ii", $lastidpost, $lastidtag);
                    $sql->execute();
                }
            }
        }
        header("location:profilo.php");
    }
} else {
    header("location:AddPost.php");
}
$sql->close();
$conn->close();
