<?php

echo '
<nav class="navbar sticky-top navbar-expand text-white" aria-label="Tenth navbar example" style="background-color: #c82a1e;">
        <div class="container-fluid justify-content-start">
            <a class="disabled navbar-brand" href="index.php"><img src="img/icon.png" alt="" width="35px" class="d-inline-block align-text-top" /></a>
            <h3><a class="disabled navbar-brand" href="index.php">HypeBest</a></h3>

            <div class="collapse navbar-collapse"  style="  position: absolute;left: 50%;transform: translate(-50%);"id="navbarsExample08">
                <div class="navbar-nav">

                    <div class="d-flex">
                        <!-- <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center"> -->
                        <a href="index.php" class=" nav-link px-2 text-white mx-1"><i class="fa-solid fa-house fa-lg"></i></a>
                        <a href="AddPost.php" class="nav-link px-2 text-white mx-1"><i class=" fa fa-regular fa-plus fa-lg"></i></a>
                        <a href="search.php" class="nav-link px-2 text-white mx-1"><i class="fa fa-regular fa-magnifying-glass fa-lg"></i></a>
                        <!-- <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
                        <!-- </ul> -->

                        <div class="text-end">
                            <button type="button" style="border:0px solid white " class="btn mx-1 "><a class="disabled hover" href="profilo.php"><i class="fa-solid fa-user fa-lg"></i></a></button>
                            <!-- <button type="button" class="btn btn-outline-light me-2">Login</button> -->
                            <!-- <button type="button" class="btn btn-warning">Sign-up</button> -->
                        </div>


                        

                    </div>

                </div>
                <!-- <form class=" " role="search">
                    <input type="search" class="form-control form-control-dark text-black bg-white" name="q" placeholder="Cerca..." aria-label="Search">
                </form> -->


            </div>

        </div>
    </nav>
';
    ?>