<?php
include '../connect.php';
session_start();
if (isset($_GET['filename'])) {
    $fileName    = $_GET['filename'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tugas WHERE file_tugas = '$fileName'"));
    header('Content-Description: File Transfer');
    header("Content-Disposition: attachment; filename=$fileName");
}
