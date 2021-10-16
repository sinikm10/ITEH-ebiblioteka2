<?php
include "init.php";

$curl_zahtev = curl_init("http://localhost/ebiblioteka/api/zaduzenja");

curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
$curl_odgovor = curl_exec($curl_zahtev);
$zaduzenja = json_decode($curl_odgovor, true);
curl_close($curl_zahtev);

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
                     <h2>Trenutno slobodne knjige</h2>
                  </div>
                  <div class="full">
                  </div>
               </div>
            </div>
            <div class="row product_section" >

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Clan</th>
                        <th>Datum zaduzenja</th>
                        <th>Razduzi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($zaduzenja as $zaduzenje){
                        ?>
                        <tr>
                            <td><?= $zaduzenje['nazivKnjige'] ?></td>
                            <td><?= $zaduzenje['imePrezime'] ?></td>
                            <td><?= $zaduzenje['datumZaduzenja'] ?></td>
                            <td><a href="razduzi.php?id=<?= $zaduzenje['id'] ?>" class="btn btn-success">Razduzi</a> </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
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

   </body>
</html>
