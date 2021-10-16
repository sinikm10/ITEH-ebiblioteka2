<?php
include "init.php";
$podaciZaGrafik = $db->podaciZaGrafik();
echo json_encode($podaciZaGrafik);