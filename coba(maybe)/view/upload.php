<?php
    session_start();
    include '../connect.php';
    $directory='file/';
    $nama_upload=$_POST['inputnama'];
    $namaFoto = $_FILES['inputfile']['name'];
    $tipeFoto = $_FILES['inputfile']['type'];
    $tempFoto = $_FILES['inputfile']['tmp_name'];
    move_uploaded_file($tempFoto, $directory . $namaFoto);
    $catatan=$_POST['inputcatatan'];
    $upload=mysqli_query($conn, "INSERT INTO tugas VALUES('','$_SESSION[nama]', '$namaFoto', '', '$catatan')");

    if ($upload){
        header('location:upload1.php');
    }
