<?php

include("koneksi.php");
// Mendapatkan Data
$email = $_POST["email"];
$password = $_POST["password"];

// Cari Data Berdasarkan Email
$query = mysqli_query( $koneksi, "select * from user where email='$email'");

$jumlah_data = mysqli_num_rows($query);

if($jumlah_data > 0){
    $data = mysqli_fetch_array($query);
    
        if (password_verify($password, $data['password'])) {
            session_start();
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['role'] = $data['role'];

            if($data['role'] == "admin"){
                header("location: admin/index.php");
            }else if ($data['role'] == "user"){

                header("Location: index.php");
            }
    }else{
        header("Location: login.php?error= password salah");
        //echo "username / password salah";
    }
}else{
    // Kalau datanya tidak ada
    }
    header("Location: login.php?error= username salah");