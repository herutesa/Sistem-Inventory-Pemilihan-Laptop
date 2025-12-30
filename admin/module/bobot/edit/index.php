 <?php 
	$id = $_GET['bobot'];
	$hasil = $lihat -> bobot_edit($id);
?>
<h4>Edit Bobot</h4>
<br>
<a href="#" onclick="goBack()" class="btn btn-primary btn-md mr-2"><i class="fa fa-angle-left"></i> Kembali </a>
	<script>
	function goBack() {
		// Mendapatkan halaman sebelumnya dari riwayat browser
		window.history.back();
	}
	</script>
<br>
<br>
 <?php if(isset($_GET['success'])){?>
 <div class="alert alert-success">
     <p>Edit Data Berhasil !</p>
 </div>
 <?php }?>
 <?php if(isset($_GET['remove'])){?>
 <div class="alert alert-danger">
     <p>Hapus Data Berhasil !</p>
 </div>
 <?php }?>
<div class="card card-body">
	<div class="table-responsive">
		<table class="table table-striped">
			<form action="fungsi/edit/edit.php?bobot=edit" method="POST">
			<input type="hidden" name="id_kategori" value="<?php echo $hasil['id_kategori']; ?>">
                <td>Kategori</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['jenis_aplikasi'];?>" name="jenis_aplikasi"></td>
				</tr>
				<td>Clockspeed</td>
					<td><input type="number" step="0.01" class="form-control" value="<?php echo $hasil['clockspeed'];?>" name="clockspeed"></td>
				</tr>
				<td>RAM</td>
					<td><input type="number" step="0.01" class="form-control" value="<?php echo $hasil['ram'];?>" name="ram"></td>
				</tr>
				</tr>
				<td>VRAM</td>
					<td><input type="number" step="0.01" class="form-control" value="<?php echo $hasil['vram'];?>" name="vram"></td>
				</tr>
				</tr>
				<td>Storage</td>
					<td><input type="number" step="0.01" class="form-control" value="<?php echo $hasil['storage'];?>" name="storage"></td>
				</tr>
				</tr>
				<td>Harga</td>
					<td><input type="number" step="0.01" class="form-control" value="<?php echo $hasil['harga'];?>" name="harga"></td>
				</tr>
				<tr>
				<tr>
					<td></td>
					<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
				</tr>
			</form>
		</table>
	</div>
</div>