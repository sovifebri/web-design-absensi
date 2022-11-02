<form method="post" action="./view/apload.php" name="form1" id="form1" onSubmit="return valregister()" enctype="multipart/form-data">
	<label>
		<h3>Kumpulkan Tugas</h3>
	</label>
	<div class="custom-file">
		<input type="file" class="custom-file-input" id="customFile" name="inputFile">
	</div>
	<label>
		<h4>Tambah Catatan</h4>
	</label>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td style="border-top:none;">
					<textarea class="form-control" rows="10" name="note" id="note"></textarea>
				</td>
			</tr>
		</table>
	</div>
	<button type="submit" name="submit" id="save" onclick="saveForm(); return false;" class="btn btn-success">Simpan</button>
</form>
<script type="text/javascript">
	function valregister() {
		if (form1.note.value == "") {
			alert("Catatan tidak boleh kosong");
			form1.note.focus();
			return false;
		}
		return true;
	}
</script>