<?php

session_start();

// cek coockie awalan dicek
if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}

// // lanjut set session dicek
// if (isset($_SESSION["login"])) {
//     header("Location: index.php");
//     exit;
// }

//tf data dari file koneksi
include 'koneksi.php';

// pengecekan tombol sumbit ws dipencet ta durung\
if (isset($_POST['login'])) {
    global $koneksi;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek = mysqli_query($koneksi, "SELECT * FROM usermahasiswa WHERE username = '$username'");

    // cek username
    // bris yang dikembalikan
    if (mysqli_num_rows($cek) == 1) {
        $cekPw = mysqli_fetch_assoc($cek);
        if (password_verify($password, $cekPw["password"])) {
            // coba set session
            $_SESSION["login"] = true;

            // set cockies
            if (isset($_POST['remember'])) {
                setcookie('login', 'true', time() + 60);
            }

            header("Location: halmahasiswa.php");
            exit;
        }
        $error = true;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 100px;
        }

        .card-header {
            background-color: #6c757d;
            color: #343a40;
        }

        .btn-info {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-info:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
    </style>
</head>

<body>
    <div class="container">
        <br><br>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="text-dark">Login</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($error)) {
                            echo "<div class='alert alert-danger' role='alert'>Password wrong, please try again!</div>";
                        }
                        ?>
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Always Remember</label>
                            </div>
                            <button style="width: 100%;" class="btn btn-info" type="submit" name="login">Login!</button>
                        </form>
                        <hr>
                        <p class="text-center">Don't have an account? Call Admin (30923)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>