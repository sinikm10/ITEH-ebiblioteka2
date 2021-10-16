<?php
include 'init.php';

$pretraga = $_GET['pretraga'];
$knjige = $db->pretragaKnjiga($pretraga,true);

foreach ($knjige as $knjiga) {
    ?>

    <div class="col-md-4">
        <div class="full product_blog margin_top_30">
            <h3><span style="color: #72dd78 !important;"><?= $knjiga->nazivKnjige ?> (<?= $knjiga->nazivZanra ?>)</span></h3>
            <h4 style="text-align: center;"><?= $knjiga->autorKnjige ?></h4>
            <?php
                if($_SESSION['ulogovan']){
                    ?>
                    <p class="text-center"><a class="btn btn-primary" href="zaduziKnjigu.php?knjigaID=<?= $knjiga->knjigaID ?>">Zaduzi knjigu</a></p>
                    <?php
                }
            ?>
        </div>
    </div>
    <?php
}
?>