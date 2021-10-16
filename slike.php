<?php
include "init.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://pixabay.com/api/?key=14926465-74241bc3696af1ce21b554643&q=books&image_type=photo');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$rez = curl_exec($ch);
$data = json_decode($rez);
curl_close($ch);
$niz = $data->hits;
?>
<div class="row">
<?php
foreach ($niz as $podatak){
    ?>
<div class="col-md-3">
    <img src="<?= $podatak->largeImageURL ?>" class="img img-thumbnail">
</div>
<?php
}
?>
</div>
