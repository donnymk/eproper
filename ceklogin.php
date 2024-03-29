<?php

session_start();
//tells php to show all but DEPRECATED errors
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_POST['username'])) {
    $username_login__ = $_POST['username'];
    $password_login__ = $_POST['password'];

    include "plugins/config.php";
    include 'plugins/enkrip-dekrip.php';

    // Mencegah MySQL injection
    $username_login_ = stripslashes($username_login__);
    $password_login_ = stripslashes($password_login__);
    $username_login = mysqli_real_escape_string($con, $username_login_);
    $password_login = mysqli_real_escape_string($con, $password_login_);

    // SQL query untuk memeriksa apakah username terdapat di database?
    $query_cek_username = mysqli_query($con, "SELECT * FROM user WHERE user='$username_login'");

    if (mysqli_num_rows($query_cek_username) != 0) {
        $cocok = mysqli_fetch_array($query_cek_username);
        $password_database = $cocok['password'];
        $tipe_user = $cocok['tipe'];

        if ($password_database == enkrip($password_login)) { //enkrip($password_login)
            if ($tipe_user == 'superadmin') {
                $_SESSION['superadmin'] = $username_login;
                $_SESSION['nama'] = $cocok['nama'];
                //$_SESSION['password'] = $password_login;
                echo "superadmin";
            } else if ($tipe_user == 'admin') {
                $_SESSION['admin'] = $username_login;
                $_SESSION['nama'] = $cocok['nama'];
                //$_SESSION['password'] = $password_login;
                echo "admin";
            } else if ($tipe_user == 'kabkota') {
                $_SESSION['kabkota'] = $username_login;
                $_SESSION['nama'] = $cocok['nama'];
                $_SESSION['namadiklat'] = $cocok['namadiklat'];
                $_SESSION['jenisdiklat'] = $cocok['jenisdiklat'];
                echo 'kabkota';
            } else if ($tipe_user == 'fungsional') {
                $_SESSION['user'] = $username_login;
                $_SESSION['nama'] = $cocok['nama'];
                $_SESSION['nip'] = $cocok['nip'];
                $_SESSION['jabatan'] = $cocok['jabatan'];
                $_SESSION['skpd'] = $cocok['skpd'];
                $_SESSION['namadiklat'] = $cocok['namadiklat'];
                $_SESSION['jenisdiklat'] = $cocok['jenisdiklat'];
                //$_SESSION['password'] = $password_login;
                echo "fungsional";
            } else {
                $_SESSION['user'] = $username_login;
                $_SESSION['nama'] = $cocok['nama'];
                $_SESSION['nip'] = $cocok['nip'];
                $_SESSION['jabatan'] = $cocok['jabatan'];
                $_SESSION['skpd'] = $cocok['skpd'];
                $_SESSION['namadiklat'] = $cocok['namadiklat'];
                $_SESSION['jenisdiklat'] = $cocok['jenisdiklat'];
                //$_SESSION['password'] = $password_login;
                echo "internal";
            }
        } else {
            echo '<div class="alert alert-warning alert-dismissable">'
            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
            . 'Username atau password salah.'
            . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning alert-dismissable">'
        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
        . 'Username atau password salah.'
        . '</div>';
    }
}
