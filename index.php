<?php
session_start();

if (!isset($_SESSION['kul_adi'])){
    header("Location: ./login.php");
}

?>
<?php require 'php/navbar.php'?>
<?php require 'php/database.php' ?>
<?php require 'php/header.php' ?>
<?php require 'php/body.php' ?>
<?php require 'php/modalsAndTriggers.php' ?>
<?php require 'php/footer.php' ?>