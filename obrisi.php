<?php
include "init.php";

$id = $_GET['id'];
$db->obrisi($id);

header("Location: administracija.php");