<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include 'koneksi.php';
$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM tugas INNER JOIN usermahasiswa ON tugas.id_mahasiswa = usermahasiswa.id_mahasiswa");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Data Rekap Nilai Pengumpulan</a>
        </div>
    </nav>
    <div class="container">
        <h2>Data Tugas Mahasiswa</h2>
        <a href="datatugas.php" class="btn btn-primary">Back</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sudah Mengumpulkan</th>
                    <th>File</th>
                    <th>Download</th>
                    <th>Input Nilai</th>
                    <th>Nilai</th>
                    <th>Submit Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($d = mysqli_fetch_assoc($data)) : ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $d['namapanjang']; ?></td>
                        <td>
                            <div class="row">
                                <p><?php echo $d['tugasfile']; ?></p>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="downloaddosen.php?tugasfile=<?php echo $d['tugasfile']; ?>"><i class="fas fa-download"></i> Download</a>
                        </td>
                        <td>
                            <form method="post" action="editnilaiaksi.php">
                                <input type="hidden" name="id_tugas" value="<?= $d['id_tugas'] ?>">
                                <input type="number" name="nilai" class="form-control" min="0" max="100">
                        </td>
                        <td>
                            <?php echo $d['nilai']; ?>
                        </td>
                        <td>
                            <?php if (!empty($d['nilai'])) { ?>
                                <button type="submit" class="btn btn-danger">Edit Nilai</button>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-danger">Submit Nilai</button>
                            <?php } ?>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>