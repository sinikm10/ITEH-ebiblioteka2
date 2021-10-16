<?php
session_start();

include "Database.php";

if(!isset($_SESSION['ulogovan'])){
    $_SESSION['ulogovan'] = false;
}
if(!isset($_SESSION['admin'])){
    $_SESSION['admin'] = false;
}

$db = new Database();