<?php
include "init.php";

$id = $_GET['id'];
$db->razduzi($id);

header("Location: zaduzenja.php");