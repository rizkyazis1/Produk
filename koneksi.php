<?php

$koneksi = mysqli_connect("localhost", "root", "", "produk");

if (!$koneksi) {
    die (mysqli_connect_error($koneksi));
}