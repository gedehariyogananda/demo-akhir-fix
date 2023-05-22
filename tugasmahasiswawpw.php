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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-srQKmqxLm88vT0HADxGrRoM7zSmPZYEEr3h70kWEaqlS3ZsGh3vWzQ/urOJgRqJfvnNP5TQR7ZrrFyBxM03XpA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        .navbar {
            height: 70px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .dashboard .nav-link {
            color: #fff;
        }

        .dashboard {
            width: 250px;
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 0;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Halaman Mahasiswa</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="halmahasiswa.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    $no = 1;
    include 'koneksi.php';
    $query = "SELECT * FROM tugas";
    $result = mysqli_query($koneksi, $query);
    ?>

    <br><br><br><br>
    <div class="content">
        <div class="container">
            <div class="row">
                <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Tugas <?php echo $no++ ?> <?php echo $data['judul']; ?></h5>
                                <div class="card-body">
                                    <p class="card-text">Deskripsi: <?php echo $data['deskripsi']; ?></p>
                                    <p class="card-text">Deadline: <?php echo $data['deadline']; ?></p>
                                    <p class="card-text">Nilai: <?php echo $data['nilai']; ?></p>

                                    <form method="post" action="submitmahasiswa.php" enctype="multipart/form-data">
                                        <input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>">
                                        <?php if (!empty($data['nilai'])) { ?>
                                            <p>Edit Tugas:</p>
                                            <input type="file" name="tugasfile" class="form-control" value="<?php echo $data['tugasfile']; ?>" id="inputGroupFile01" required="required">
                                            <button type="submit" name="submit" value="edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Data</button>
                                        <?php } else { ?>
                                            <p>Insert Data:</p>
                                            <input type="file" name="tugasfile" class="form-control" value="<?php echo $data['tugasfile']; ?>" id="inputGroupFile01" required="required">
                                            <button type="submit" name="submit" value="simpan" class="btn btn-primary"><i class="fas fa-upload"></i> Unggah</button>
                                        <?php } ?>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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