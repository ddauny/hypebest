<?php
session_start();
include("login/connection.php");
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>HypeBest - Profile</title>

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

<body>


    <?php
    include("navBar.php");

    if (isset($_SESSION["idutente"])) {
        if (isset($_GET["idutente"])) {
            $idutente = $_GET["idutente"];
        } else {
            $idutente = $_SESSION["idutente"];
        }

        $sqlutente = "select * from utente where ID = $idutente";
        $resultutente = mysqli_query($conn, $sqlutente);
        $rowutente = $resultutente->fetch_assoc();

        $sqlpost = "select * from post where IDUtente = $idutente and pubblicato = 1";
        $resultpost = mysqli_query($conn, $sqlpost);

        $sqlnpost = "select count(*) from post where IDUtente = $idutente and pubblicato = 1";
        $resultnpost = mysqli_query($conn, $sqlnpost);
        $rpost = $resultnpost->fetch_assoc();
        $npost = $rpost["count(*)"]; //npost è il numero dei post dell'utente

        $sqlnfollower = "select count(*) from segue where IDSeguito = $idutente";
        $resultnfollower = mysqli_query($conn, $sqlnfollower);
        $rfollower = $resultnfollower->fetch_assoc();
        $nfollower = $rfollower["count(*)"]; //nlike è il numero di like totali dell'utente

        $sqlnsave = "select count(*) from salva join post on IDPost = post.ID join utente on post.IDUtente = utente.ID where utente.ID = $idutente";
        $resultnsave = mysqli_query($conn, $sqlnsave);
        $rsave = $resultnsave->fetch_assoc();
        $nsave = $rsave["count(*)"]; //nsave è il numero di salvataggi dei post dell'utente


        echo "<div class='container my-3' >
            <div style='width:55%' class='d-flex flex-row justify-content-center' >
                <div>
                    <img class='card-img-top' style='width: 150px;height: 150px; border-radius:80%;' src='$rowutente[img]'>
                </div>
                <div class='d-flex flex-column ms-5'>
                        <div><h3>$rowutente[username]</h3></div>
                        <div>$rowutente[bio]</div>";

        if ($idutente != $_SESSION["idutente"]) { //se l'utente che guarda il profilo non è se stesso

            $sql = "select ID from segue where IDSeguito = $idutente and IDSeguace = $_SESSION[idutente]";
            $r = mysqli_query($conn, $sql);
            if ($r->num_rows > 0) { //vuol dire che già segue
                echo "<div><button type='button' class='btn btn-danger'onclick='unfollow($idutente)'>Unfollow</button></div>";
            } else {
                echo "<div><button type='button' class='btn btn-dark 'onclick='follow($idutente)'>Follow</button></div>";
            }
        } else {
            echo "<div class='align-self-end'><button class='border-0 bg-transparent' onclick='edit($idutente)'><i class='fa-solid fa-pen-to-square fa-xl'></i></button>
                            <button class='border-0 bg-transparent' onclick='logout()'><i class='fa-solid fa-arrow-right-from-bracket fa-xl'></i></button></div>";
        }
        echo "</div>";




        echo " </div><div class='d-flex flex-row justify-content-evenly my-4 '>
        <div class=''>$nfollower followers </div>
        <div class=''>$npost posts</div>
        <div class=''>$nsave saves</div>
 </div>
 <hr>
 
";

        //COMINCIA VISUALIZZAZIONE DEI POST
        if ($resultpost->num_rows > 0) { //se ho almeno un post
            echo "<div class='d-flex flex-row justify-content-center'>";
            $contatore = 0;
            echo "<div class=' d-flex flex-row ' style='max-width:1020px;'>";
            while ($post = $resultpost->fetch_assoc()) {
                echo "<div class='col-lg-4 col-md-4 my-2'>
                    <a href='post.php?idpost=$post[ID]'>
                        <img class='square img-fluid'src='$post[img]'>
                    </a>
                </div>";
                $contatore++;

                //     if($contatore==3){
                //         $contatore=0;
                //     echo "</div>";
                // echo "<div class='row'>";

                //     }
            }
            echo "</div>";
        }
        echo "</div></div></div>";
    }
    ?>


</body>


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

    function logout() {
        window.location = "login/logout.php";
    }
</script>