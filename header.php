
<header class="header">

    <div class="header_top_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="full">
                        <div class="logo">
                            <a href="index.php"><img src="images/logo-knjiga.png" alt="#" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 site_information">
                    <div class="full">
                        <div class="top_section_info">
                            <ul>
                                <li>Telefon: <img src="images/i1.png" alt="#" /> <a href="#">( +381 65 2323 121 )</a></li>
                                <li><img src="images/i2.png" alt="#" /> <a href="#">knjizara@gmail.com</a></li>
                                <li><img src="images/i3.png" alt="#" /> <a href="#">Jove Ilica 123 , Beograd</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header_bottom_section">

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="full ">
                        <div class="main_menu">
                            <nav class="navbar navbar-inverse navbar-toggleable-md">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="float-left">Menu</span>
                                    <span class="float-right"><i class="fa fa-bars"></i> <i class="fa fa-close"></i></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                                    <ul class="navbar-nav">
                                        <li class="nav-item ">
                                            <a class="nav-link" href="index.php">Slobodne knjige</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="knjige.php">Spisak svih knjiga</a>
                                        </li>
                                        <?php
                                            if($_SESSION['ulogovan']){
                                                ?>
                                                <li class="nav-item ">
                                                    <a class="nav-link" href="zaduzenja.php">Zaduzenja</a>
                                                </li>
                                                <li class="nav-item ">
                                                    <a class="nav-link" href="noviclan.php">Unesi clana</a>
                                                </li>
                                        <?php
                                                if($_SESSION['admin']){
                                                    ?>
                                                <li class="nav-item ">
                                                    <a class="nav-link" href="administracija.php">Administracija</a>
                                                </li>
                                        <?php
                                                }

                                                ?>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="logout.php">Logout</a>
                                                </li>
                                        <?php

                                            }else{
                                                ?>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="login.php">Login</a>
                                                </li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
