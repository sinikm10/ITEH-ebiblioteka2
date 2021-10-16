<?php
include "init.php";

$sort = 'asc';

if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
}

$knjige = $db->vratiKnjige($sort);
?>

<!DOCTYPE html>
<html lang="en">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>E-biblioteka</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="images/fevicon.png" type="image/png" />
   <link href="css/bootstrap.css" rel="stylesheet">
   <link href="css/font-awesome.min.css" rel="stylesheet">
   <link href="css/animate.css" rel="stylesheet">
   <link href="style.css" rel="stylesheet">
   <link href="css/responsive.css" rel="stylesheet">
   <link href="css/colors.css" rel="stylesheet">
   <link href="css/ekko-lightbox.css" rel="stylesheet">
   </head>
   <body id="home_page" class="home_page">
      <div id="preloader">
         <img class="preloader" src="images/logo-knjiga.png" alt="#">
      </div>

      <?php include 'header.php'; ?>

      <section class="layout_padding padding_bottom_0" style="background: #fff;">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="full heading_s1">
                     <h2>Sve knjige biblioteke</h2>
                  </div>
                  <div class="full">
                     <p class="large">Sortiraj po nazivu</p>
                      <a href="knjige.php?sort=asc" class="btn btn-primary">Rastuce</a>
                      <a href="knjige.php?sort=desc" class="btn btn-success">Opadajuce</a>

                  </div>
               </div>
            </div>
            <div class="row product_section" id="rezultat">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Autor</th>
                        <th>Zanr</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($knjige as $knjiga){
                                ?>
                            <tr>
                                <td><?= $knjiga->nazivKnjige ?></td>
                                <td><?= $knjiga->autorKnjige ?></td>
                                <td><?= $knjiga->nazivZanra ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
          </div>
      </section>

      <footer class="footer layout_padding">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <p>© 2020 All Rights Reserved. </p>
                  </div>
              </div>
          </div>
      </footer>

      <script src="js/jquery.min.js"></script>
      <script src="js/tether.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/parallax.js"></script>
      <script src="js/animate.js"></script>
      <script src="js/ekko-lightbox.js"></script>
      <script src="js/custom.js"></script>


   </body>
</html>
