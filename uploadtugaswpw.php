<?php
// koneksi database
include 'koneksi.php';

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif', 'pdf');
$filename = $_FILES['tugaswpw']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (in_array($ext, $ekstensi)) {
    $xx = $rand . '_' . $filename;
    move_uploaded_file($_FILES['tugaswpw']['tmp_name'], 'tugasmahasiswa/' . $rand . '_' . $filename);
    mysqli_query($koneksi, "insert into usermahasiswa values('','$xx')");
    echo '<script>alert("berhasil ditambahkan!"); window.location.href = "tugasmahasiswa.php";</script>';
} else {
    echo '<script>alert("gagal!"); window.location.href = "tugasmahasiswa.php";</script>';
}
