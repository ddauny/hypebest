<?php
session_start();
include("login/connection.php");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home</title>
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
</head>
<nav class="navbar navbar-expand-lg p-3 text-white" style="background-color: #c82a1e;">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <!-- <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a> -->

            <!-- <a class="disabled" href="index.php"><img src="img/icon.png" alt="" width="35px"  class="d-inline-block align-text-top" /></a> -->
            <h3><a class="disabled" href="index.php">HypeBest</a></h3>

            <div class="d-flex justify-content-between">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center">
                    <li><a href="index.php" class="nav-link px-2 text-white"><i class="fa-solid fa-house fa-lg"></i></i></a></li>
                    <li><a href="AddPost.html" class="nav-link px-2 text-white"><i class=" fa fa-regular fa-plus fa-lg"></i></a></li>
                    <li><a href="search.php" class="nav-link px-2 text-white"><i class="fa fa-regular fa-magnifying-glass fa-lg"></i></a></li>
                    <!-- <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
                </ul>
            </div>


            <!-- <h3>HypeBest</h3> -->
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-white bg-white" name="q" placeholder="Cerca..." aria-label="Search">
            </form>
            <!-- <div class="container">
                <input class="col-12 col-lg-2 mb-3 mb-lg-0 me-lg-3 form-control form-control-dark text-white bg-white" id="myInput" type="text" placeholder="Search..">
                <br>
                <?php
                // echo '<ul class="list-group" id="myList">';
                // //session_start();
                // //include("login/connection.php");
                // $sql = "select * from utente";
                // $result = mysqli_query($conn, $sql);
                // if ($result->num_rows > 0) {
                //     while ($row = $result->fetch_assoc()) {
                //         echo "<li class='list-group-item'><a href='profilo.php?idutente=$row[ID]'>$row[username]</a></li>";
                //     }
                // }
                // echo "</ul>";
                ?>

            </div> -->

            <div class="text-end">
                <button type="button" style="border:0px solid white" class="btn btn-outline-light me-2"><a class="disabled" href="profilo.php"><i class="fa-solid fa-user fa-lg"></i></a></button>
                <!-- <button type="button" class="btn btn-outline-light me-2">Login</button> -->
                <!-- <button type="button" class="btn btn-warning">Sign-up</button> -->
            </div>
        </div>
    </div>
</nav>

<body>
    <div class="container">

        <?php
        if (isset($_SESSION["idutente"])) {
            $sql = "select post.ID as idpost, username, post.img as imgpost, utente.ID as idutente, descrizione, utente.img as imgutente from post join utente on post.IDUtente = utente.ID join segue on utente.ID = segue.IDSeguito where pubblicato = 1 and segue.IDSeguace = 4 order by post.ID asc";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo
                    "<div class='card' style='max-width:50%;min-width:460px; margin-left: auto; margin-right: auto;margin-bottom:10px;margin-top:20px'>
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
                        $classlike = "fa-solid";
                    }

                    $sqllike = "select * from salva where IDPost = $row[idpost] and IDUtente = $_SESSION[idutente]";
                    $resultlike = mysqli_query($conn, $sqllike);
                    $saved = 0;
                    $classsave = "fa-regular";
                    if ($resultlike->num_rows > 0) {
                        $liked = true;
                        $classsave = "fa-solid";
                    }





                    echo "
                <div style='position:relative;margin-top:5px; margin-right:5px' >
                    <div style='float:right;'>
                        <button class='border-0 bg-transparent' onclick='like($row[idpost],$liked)'><i id='like$row[idpost]' class='$classlike fa-heart fa-lg'></i></button>
                        <button class='border-0 bg-transparent' onclick='save($row[idpost], $saved)'><i id='save$row[idpost]' class='fa $classsave fa-shoe-prints fa-lg'></i></button>
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
                    echo "</span>
                        </div>
                        
                    </div>
                </div>
                <div class='card-body'>
                    <p class='card-text'><a class='disabledU' style='font-weight:bold;margin-left:0px' href='profilo.php?idutente=$row[idutente]'>$row[username] </a> $row[descrizione]</p>
                ";
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
            } else { //sono loggato ma non seguo nessuno, suggerisco i post dagli interessi
                $sql = "select interesse.interesse as interesse from possiede join interesse on IDInteresse = interesse.ID where IDUtente = $_SESSION[idutente]";
                $result = mysqli_query($conn, $sql);
                $interessi = array();
                while ($row = $result->fetch_assoc()) {
                    array_push($interessi, $row["interesse"]);
                }

                foreach ($interessi as $interesse) {
                    $sql = "select post.ID as idpost, username, post.img as imgpost, utente.ID as idutente, descrizione from post join utente on post.IDUtente = utente.ID where pubblicato = 1 and post.situazione like '%$interesse%' order by post.ID asc";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo
                            "<div class='card' style='max-width:50%;min-width:460px; margin-left: auto; margin-right: auto;margin-bottom:10px;margin-top:20px'>
                        <div style='margin-left: 6px;margin-top:6px'>
                            <div class='card-title'>
                            <img src='$row[imgutente]' class='card-img-top' style='width:40px;height:40px; border-radius:80%;'>
                            <a class='disabledU' style='font-weight:bold;margin-left:5px' href='profilo.php?idutente=$row[idutente]'>$row[username]</a></div> 
                        </div>
        
                        <div><img src='$row[imgpost]' class='card-img-top' ></div>  ";
                            $sqllike = "select * from like where IDPost = $row[idpost] and IDUtente = $_SESSION[idutente]";
                            $resultlike = mysqli_query($conn, $sqllike);
                            $liked = false;
                            if ($resultlike->num_rows > 0) $liked = true;
                            echo "
                        <div style='position:relative;margin-top:5px; margin-right:5px' >
                            <div style='float:right;'>
                                <button class='border-0 bg-transparent' onclick='like($row[idpost])'><i id='like$row[idpost]' class='fa-regular fa-heart fa-lg'></i></button>
                                <button class='border-0 bg-transparent' onclick='save($row[idpost])'><i id='save$row[idpost]' class='fa fa-regular fa-shoe-prints fa-lg'></i></button>
                                <div class='popup' onclick='popup()'><i class='fa fa-regular fa-tag fa-lg'></i>
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
                            echo "</span>
                        </div>
                        
                    </div>
                </div>
                        <div class='card-body'>
                            <p class='card-text'><a class='disabledU' style='font-weight:bold;margin-left:0px' href='profilo.php?idutente=$row[idutente]'>$row[username] </a> $row[descrizione]</p>
                        ";
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
                    }
                }
            }
        } else {
            header("location:index.php");
        }
        ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>