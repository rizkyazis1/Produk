<?php

include("koneksi.php");
session_start();
// Mendapatkan Data
$email = $_POST["email"];
$password = $_POST["password"];

// Cari Data Berdasarkan Email
$query = mysqli_query( $koneksi, "select * from user where email='$email'");

$jumlah_data = mysqli_num_rows($query);
if($jumlah_data > 0){

    $data = mysqli_fetch_array($query);
    // kalau password yg ada di table sama dengan password yang diinput
    // if($data['password'] == $password) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['email'] = $data['email'];
            $_SESSION['role'] = $data['role'];

            echo "Berhasil Login";
        // header("Location: index.php");
    }else{
        echo "username / password salah";
        // header("Location: login.php?error= password salah");
    }
}else{
    // Kalau datanya tidak ada

    echo "password Salah";
    }
    // header("Location: login.php?error= username salah");