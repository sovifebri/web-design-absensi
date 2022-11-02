<?php
// folder penenmapatan untuk file yang diupload bisa disesuaikan
// selama php bisa membaca folder tersebut
$uploadDir = '../file/';
if (isset($_POST['upload'])) {
 $fileName = $_FILES['userfile']['name'];
 $tmpName = $_FILES['userfile']['tmp_name'];
 $fileSize = $_FILES['userfile']['size'];
 $fileType = $_FILES['userfile']['type'];
 $filePath = $uploadDir . $fileName;
 $result = move_uploaded_file($tmpName, $filePath);
 if($result){
 echo "<br>File uploaded<br>";
 exit;
 }else{
 echo "Gagal Upload";
 } 
}
