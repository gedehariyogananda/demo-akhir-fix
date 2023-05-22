<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include 'koneksi.php'; // Ganti dengan username dosen yang ingin Anda ambil datanya
$id_dosen = $_GET['id_dosen'];
$query = "SELECT * FROM userdosen WHERE id_dosen='$id_dosen'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result); // Inisialisasi $data
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Dosen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }

        .sidebar .nav-link {
            color: #fff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h3>Dasbor Dosen</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-user"></i> Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-book"></i> Mata Kuliah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-cog"></i> Pengaturan</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <h1>Selamat Datang, <?php echo $data['username']; ?></h1>
        <br>
        <div class="card">
            <div class="card-header">
                Profil
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="gambar/<?php echo $data['gambar']; ?>" width="150" height="190">
                    </div>
                    <div class="col-md-7">
                        <p>NIP: <?php echo $data['nip']; ?></p>
                        <p>Nama Lengkap: <?php echo $data['namalengkap']; ?></p>
                        <p>Alamat: <?php echo $data['alamat']; ?></p>
                        <p>Tanggal Lahir: <?php echo $data['tgllahir']; ?></p>
                        <p>No.Hp: <?php echo $data['notelp']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Mata Kuliah
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    $data2 = $data;
                    $no = 1;
                    if ($data2 == $data) {
                    ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <?php echo $data2['kelasampu']; ?>
                                </div>
                                <div class="card-body">
                                    <h4><?php echo $data2['matakuliahampu']; ?></h4>
                                    <a href="wpw<?php echo $no++ ?>.php" class="btn btn-secondary">masuk</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>