<?php
include 'koneksi.php';

// tugas
$id_dosen = $_POST['id_dosen'];
$id_mahasiswa = $_POST['id_mahasiswa'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$deadline = $_POST['deadline'];
$tugasfile = $_POST['tugasfile'];
$nilai = $_POST['nilai'];

mysqli_query($koneksi, "INSERT INTO tugas VALUES('','$id_dosen','$id_mahasiswa','$judul','$deskripsi','$deadline','$tugasfile','$nilai')");
echo '<script>alert("berhasil ditambahkan!"); window.location.href = "buattugasdosen.php";</script>';
