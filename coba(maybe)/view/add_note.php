<form method="post" action="./model/proses.php" name="form1" id="form1" onSubmit="return valregister()">
	<label>
		<h3>Kumpulkan Tugas</h3>
	</label>
	<div class="custom-file">
		<input type="file" class="custom-file-input" id="customFile">
		<label class="custom-file-label" for="customFile">Choose file</label>
	</div>
	<label>
		<h3>Tambah Catatan</h3>
	</label>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td style="border-top:none;">
					<textarea class="form-control" rows="10" name="note" id="note"></textarea>
				</td>
			</tr>
			<tr>
				<td style="border-top:none;">
					<button type="submit" name="simpan_note" id="save" onclick="saveForm(); return false;" class="btn btn-success">Simpan</button>
				</td>
			</tr>
		</table>
	</div>
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