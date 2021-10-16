<?php
include "init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
                     <h2>Trenutno slobodne knjige</h2>
                  </div>
                  <div class="full">
                     <p class="large">Pretraga po nazivu</p>
                      <input type="text" id="pretraga" class="form-control" onkeyup="pretrazi()" placeholder="Pretrazite knjige po nazivu">
                  </div>
               </div>
            </div>
            <div class="row product_section" id="rezultat">

            </div>
          </div>
          <br><br>
      </section>
      <section class="layout_padding padding_bottom_0" style="background: #fff;">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="full heading_s1">
                          <h2>Koliko je knjiga lepa</h2>
                      </div>
                      <div class="full">
                      </div>
                  </div>
              </div>
              <div class="row product_section" id="knjige">

              </div>
          </div>
          <br><br>
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

   <script>
       function pretrazi() {
           $.ajax({
               url: 'pretragaKnjiga.php',
               data: {
                   pretraga : $("#pretraga").val()
               },
               success: function (data) {
                   $("#rezultat").html(data);
               }
           })
       }
       pretrazi();
   </script>

      <script>
              $.ajax({
                  url: 'slike.php',
                  success: function (data) {
                      $("#knjige").html(data);
                  }
              });

      </script>
   </body>
</html>
