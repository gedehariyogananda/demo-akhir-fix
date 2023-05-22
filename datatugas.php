<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dosen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-srQKmqxLm88vT0HADxGrRoM7zSmPZYEEr3h70kWEaqlS3ZsGh3vWzQ/urOJgRqJfvnNP5TQR7ZrrFyBxM03XpA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
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
            margin-left: 400px;
            padding: 20px;
        }
    </style>
</head>


<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <br><br>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="wpw1.php"><i class="fas fa-users"></i> Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="uploadtugasdosen.php"><i class="fas fa-file-upload"></i> Upload Materi Pembelajaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="buattugasdosen.php"><i class="fas fa-tasks"></i> Buat Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="datatugas.php"><i class="fas fa-clipboard"></i> Data Pengumpulan Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </li>

                </ul>
            </div>


            <br><br>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">Data Mata Kuliah Workshop Pemrograman Web</a>
                </div>
            </nav>

            <!-- content -->
            <div class="col-md-9 content">
                <div class="col-md-9">
                    <?php
                    include 'koneksi.php';
                    $query = "SELECT * FROM tugas";
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;
                    ?>
                    <h2>Data Tugas Mahasiswa</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul Tugas</th>
                                <th scope="col">Deskripsi Tugas</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Data Pengumpulan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['deskripsi']; ?></td>
                                    <td><?php echo $data['deadline']; ?></td>

                                    <td>
                                        <a href="nilai.php" class="btn btn-primary"><i class="fas fa-eye"></i> Cek Detail</a>
                                    </td>

                                    </td>
                                    <!-- <td>
                                        <input type="number" class="form-control" min="0" max="100">
                                    </td> -->
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>
</body>

</html>