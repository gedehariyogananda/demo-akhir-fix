<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// koneksi database
include 'koneksi.php';

$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi, "delete from mahasiswa where id='$id'");

header("location:index.php");
