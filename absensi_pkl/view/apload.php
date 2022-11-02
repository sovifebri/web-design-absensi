<?php
session_start();
include '../view/connect.php';
$directory = '../file/';
$namafile = $_FILES['inputFile']['name'];
$tipefile = $_FILES['inputFile']['type'];
$tempfile = $_FILES['inputFile']['tmp_name'];
move_uploaded_file($tempfile, $directory . $namafile);
$catatan = $_POST['note'];
$upload = mysqli_query($conn, "INSERT INTO tugas VALUES('', '$namafile', '', '$catatan')");

if ($upload) {
    header("location:../tambah_catatan");
}
