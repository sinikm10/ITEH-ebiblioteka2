<?php
include "init.php";
$poruka = "";

if(isset($_POST['unos'])){
    $naziv = trim($_POST['naziv']);
    $autor = trim($_POST['autor']);
    $zanr = trim($_POST['zanr']);

    $uspesno = $db->unesiKnjigu($naziv,$autor,$zanr);

    if($uspesno){
        $poruka= "Uspesno ste uneli knjigu";
    }else{
        $poruka = "Doslo je do greske";
    }
}

$zanrovi = $db->vratiZanrove();
$curl_zahtev = curl_init("http://localhost/ebiblioteka/api/svaZaduzenja");

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
   <link href="css/datatables.css" rel="stylesheet">

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
                     <h2>Administracija</h2>
                  </div>
                  <div class="full">
                      <p class="large"><?= $poruka ?></p>
                  </div>
               </div>
            </div>
            <div class="row product_section">
                <table class="table table-hover" id="tabela">
                    <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Clan</th>
                        <th>Datum zaduzenja</th>
                        <th>Datum razaduzenja</th>
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
                            <td><?= $zaduzenje['datumRazduzenja'] ?></td>
                            <td><a href="obrisi.php?id=<?= $zaduzenje['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>
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

      <section class="layout_padding padding_bottom_0" style="background: #fff;">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="full heading_s1">
                          <h2>Unos knjige</h2>
                      </div>
                      <div class="full">
                          Unesite knjugu
                      </div>
                  </div>
              </div>
              <form method="post" action="">
                  <label for="naziv">Naziv</label>
                  <input type="text" id="naziv" name="naziv" class="form-control">
                  <label for="autor">Autor</label>
                  <input type="text" id="autor" name="autor" class="form-control">
                  <label for="zanr">Zanr</label>
                  <select id="zanr" class="form-control" name="zanr">
                      <?php

                      foreach ($zanrovi as $zanr) {
                          ?>
                          <option value="<?= $zanr->zanrID ?>"><?= $zanr->nazivZanra ?></option>
                          <?php
                      }
                      ?>
                  </select>
                  <br>
                  <input type="submit" class="btn btn-success" value="Unesi knjigu" name="unos">
              </form>
          </div>
          <br><br>
      </section>
      <section class="layout_padding padding_bottom_0" style="background: #fff;">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="full heading_s1">
                          <h2>Zanrovi</h2>
                      </div>
                      <div class="full">
                          Graficki prikaz
                      </div>
                  </div>
              </div>
              <div id="piechart_3d" style="width: 500px; height: 400px;"></div>                        </div>
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
      <script src="js/datatables.js"></script>
      <script src="js/custom.js"></script>

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
              let nizPodataka = [];
              let header = ['Zanr', 'Broj knjiga po zanru'];
              nizPodataka.push(header);

              $.ajax({
                  url: 'podaciGrafik.php',
                  success: function (podaci) {
                      let niz = JSON.parse(podaci);
                      $.each(niz, function (i,element) {
                          let n = [element.nazivZanra,parseInt(element.broj)]
                          nizPodataka.push(n);
                      });
                      var data = google.visualization.arrayToDataTable(nizPodataka);
                      var options = {
                          title: 'Broj knjiga po zanru',
                          is3D: true
                      };

                      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                      chart.draw(data, options);
                  }
              });
          }
      </script>

      <script>
           $('#tabela').DataTable();
   </script>

   </body>
</html>
