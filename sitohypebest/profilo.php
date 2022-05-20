<?php
session_start();
include("login/connection.php");
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Profilo</title>

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
<nav class="navbar sticky-top navbar-expand-lg p-3 text-white" style="background-color: #c82a1e;">
    <div class="container-fluid">

        <a class="disabled navbar-brand" href="index.php"><img src="img/icon.png" alt="" width="35px"  class="d-inline-block align-text-top" /></a>
        <h3><a class="disabled navbar-brand" href="index.php">HypeBest</a></h3>

        <div class="collapse navbar-collapse">
            <!-- <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a> -->

            <div class="navbar-nav me-auto mb-2 mb-lg-0 ">

            <div class="d-flex justify-content-end">
                <!-- <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center"> -->
                   <a href="index.php" class=" nav-link px-2 text-white"><i class="fa-solid fa-house fa-lg"></i></a>
                    <a href="AddPost.html" class="nav-link px-2 text-white"><i class=" fa fa-regular fa-plus fa-lg"></i></a>
                    <a href="search.php" class="nav-link px-2 text-white"><i class="fa fa-regular fa-magnifying-glass fa-lg"></i></a>
                    <!-- <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
                <!-- </ul> -->
            


            <!-- <h3>HypeBest</h3> -->
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 " role="search">
                <input type="search" class="form-control form-control-dark text-white bg-white" name="q" placeholder="Cerca..." aria-label="Search">
            </form>

            <div class="text-end">
                <button type="button" style="border:0px solid white" class="btn btn-outline-light"><a class="disabled"href="profilo.php"><i class="fa-solid fa-user fa-lg"></i></a></button>
                <!-- <button type="button" class="btn btn-outline-light me-2">Login</button> -->
                <!-- <button type="button" class="btn btn-warning">Sign-up</button> -->
            </div>

            </div>

            </div>
        </div>
    </div>
</nav>

    <?php
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

        $sqlnsave = "select count(*) from likes where IDUtente = $idutente";
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
                                echo "<div><button onclick='unfollow($idutente)'>SMETTI DI SEGUIRE</button></div>";
                            } else {
                                echo "</div><button onclick='follow($idutente)'>SEGUI</button></div>";
                            }
                        } else {
                            echo "<div><button class='border-0 bg-transparent' onclick='edit($idutente)'><i class='fa-solid fa-pen-to-square fa-xl'></i></button>
                            <button class='border-0 bg-transparent' onclick='logout()'><i class='fa-solid fa-arrow-right-from-bracket fa-xl'></i></button></div>";
                        }
                        echo"</div>";



           
            echo " </div><div class='d-flex flex-row justify-content-evenly my-4 '>
        <div class=''>$nfollower followers </div>
        <div class=''>$npost post</div>
        <div class=''>$nsave salvataggi</div>
 </div>
 <hr>
 
";

        //COMINCIA VISUALIZZAZIONE DEI POST
        if ($resultpost->num_rows > 0) { //se ho almeno un post
            echo "<div class='d-flex flex-row justify-content-center'>";
            $contatore=0;
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