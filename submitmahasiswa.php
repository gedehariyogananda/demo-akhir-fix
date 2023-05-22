<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id_mahasiswa = $_POST['id_mahasiswa'];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif', 'pdf');
$filename = $_FILES['tugasfile']['name'];
$ukuran = $_FILES['tugasfile']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (in_array($ext, $ekstensi) && $ukuran < 2000000) { // check if file extension is allowed and file size is less than 2MB
	$xx = $rand . '_' . $filename;
	move_uploaded_file($_FILES['tugasfile']['tmp_name'], 'tugasfixmahasiswa/' . $xx); // move uploaded file to file directory
	mysqli_query($koneksi, "UPDATE tugas SET tugasfile='$xx' WHERE id_mahasiswa = '$id_mahasiswa'");
	echo "<script>alert('Tugas sudah dikumpulkan'); window.location='tugasmahasiswa.php';</script>";
} else {
	header("location: tugasmahasiswawpw.php");
}
