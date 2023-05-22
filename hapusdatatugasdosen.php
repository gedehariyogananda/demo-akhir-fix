<?php

// koneksi database
include 'koneksi.php';

$id = $_GET['id_materi'];

// menghapus data dari database
mysqli_query($koneksi, "DELETE from materi where id_materi='$id'");

header("location: uploadtugasdosen.php");
