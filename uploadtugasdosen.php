<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include 'koneksi.php';
$no = 1;
$query = "SELECT * FROM materi";
$result = mysqli_query($koneksi, $query);
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
                    <h2>Upload Materi Pembelajaran</h2>
                    <form method="post" action="wpwinsert.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Masukkan Judul</label>
                            <input type="hidden" name="id_dosen" class="form-control">
                            <?php
                            include 'koneksi.php';
                            $query2 = "SELECT * FROM userdosen";
                            $result2 = mysqli_query($koneksi, $query2);
                            $data2 = mysqli_fetch_assoc($result2);
                            ?>
                            <input type="hidden" name="id_dosen" value="<?php echo $data2['id_dosen']; ?>" class="form-control">
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label">Pilih File</label>
                            <input type="file" class="form-control" name="materi" id="fileUpload">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Unggah
                        </button>

                    </form>

                    <br><br><br>

                    <p>file yang telah diupload : </p>
                    <table class="table table-bordered">
                        <tr class="table-primary">
                            <th>No</th>
                            <th>title</th>
                            <th>file</th>
                            <th>hapus</th>
                        </tr>

                        <?php while ($data = mysqli_fetch_assoc($result)) { ?>

                            <tr>
                                <td><?php echo $no++; ?></td>

                                <td><?php echo $data['title']; ?></td>
                                <td><a href="download.php?materi=<?php echo $data['materi']; ?>"><?php echo $data['materi']; ?></a></td>
                                <td>
                                    <a href="hapusdatatugasdosen.php?id_materi=<?php echo $data['id_materi']; ?>">
                                        <button type="button" class="btn btn-danger mt-2">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </a>
                                </td>


                            </tr>
                        <?php } ?>

                    </table>



                </div>
            </div>
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