<?php
if (isset($_POST['submitNilai'])) {
	$id = $_POST['id_tugas'];
	$nilaii = $_POST['nilai'];
	$addNilai = mysqli_query($conn, "UPDATE tugas SET nilai='$nilaii' WHERE id = '$id'");
	if ($addNilai) {
		header("location:catatan");
	} else {
		echo mysqli_error($conn);
	}
}
?>
<h3 class='page-header'>Nilai Tugas Mahasiswa</h3>
<div class='table-responsive'>
	<?php
	if (isset($_GET['id_siswa'])) {
		if ($_GET['id_siswa'] !== "") {
			$id_user = $_GET['id_siswa'];
			include './view/note.php';
		} else {
			header("location:catatan");
		}
	} else {
		$sql = "SELECT*FROM tugas";
		if ($conn->query($sql)->num_rows !== 0) {
			echo "<table class='table table-striped' style='width:50%'>
					<thead>
						<tr>
							<th>No</th>
							<th>Nama File</th>
							<th>Notes</th>
							<th>Nilai</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>";
			$query_siswa = $conn->query($sql);
			$no = 0;
			while ($get_siswa = $query_siswa->fetch_assoc()) {
				$nama_file = $get_siswa['file_tugas'];
				$name = $get_siswa['catatan'];
				$nilai = $get_siswa['nilai'];
				$no++;
				echo "<tr>
							<td>$no</td>
							<td>$nama_file</td>
							<td>$name</td>";
				if ($nilai == '') {
					echo "<td>belum dinilai</td>";
				} else {
					echo "<td>$nilai</td>";
				} ?>

				<td><a href='#exampleModalCenter<?php echo $get_siswa['id'] ?>' data-toggle='modal' data-target='#exampleModalCenter<?php echo $get_siswa['id'] ?>'>Nilai</a></td>
				<td><a href="donlot.php?filename=<?php echo $get_siswa['file_tugas'] ?>">Download</a></td>
				</tr>
				<div class="modal fade" id="exampleModalCenter<?php echo $get_siswa['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Tambah Nilai</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Nama File :</p>
								<p><?php echo $get_siswa['file_tugas'] ?></p>
								<p>Catatan :</p>
								<p><?php echo $get_siswa['catatan'] ?></p>
								<p>Nilai</p>
								<form action="" method="POST">
									<input type="hidden" name="id_tugas" value="<?php echo $get_siswa['id'] ?>">
									<input type="number" class="form-control" name="nilai" style="margin-bottom: 30px">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="submitNilai" class="btn btn-primary">Save changes</button>
								</form>
							</div>
						</div>
					</div>
				</div>

	<?php }
			$conn->close();
			echo "</tbody></table>";
		} else {
			echo "<div class='alert alert-danger'><strong>Tidak ada Tugas untuk ditampilkan</strong></div>";
		}
	}
	?>
	<?php
	// Downloads files
	// Tentukan folder file yang boleh di download
	// $folder = "files/";
	// $filename = $_GET['file'];
	// $file_extension = strtolower(substr(strrchr($filename, "."), 1));
	// Lalu cek menggunakan fungsi file_exist
	// 	if (!file_exists($folder . $_GET['file'])) {
	// 		echo "<h1>Access forbidden!</h1>
	//  <p>File Sudah Tidak Ada</p>";
	// 		exit;
	// 	} else if ($file_extension == 'php') {
	// 		echo "<h1>Access forbidden!</h1>
	//  <p>Maaf, file yang Anda download sudah tidak tersedia atau filenya (direktorinya) telah diproteksi. <br />.</p>";
	// 		exit;
	// 	}
	// Apabila mendownload file di folder 
	// else {

	//header("Cache-Control: public");
	//header("Content-Description: File Transfer");
	// header("Content-Disposition: attachment; filename=" . basename($filename));
	// header("Content-Type: application/octet-stream;");
	//header("Content-Transfer-Encoding: binary");
	// readfile("files/" . $filename);
	// }
	?>
</div>