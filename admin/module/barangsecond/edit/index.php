<?php 
	$id = $_GET['barang'];
	$hasil = $lihat -> barang_edit($id);
?>

<h4>Edit Barang</h4>
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
 
<div class="card card-body">
	<div class="table-responsive">
		<table class="table table-striped">
			<form action="fungsi/edit/edit.php?barangs=edit" method="POST">
				<input type="hidden" name="id" value="<?php echo $hasil['id_barang']; ?>">
				<tr>
					<td>Type</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['tipe'];?>" name="tipe"></td>
				</tr>   
				<tr>
					<td>CPU</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['prosesor'];?>" name="prosesor"></td>
				</tr>
				<tr>
					<td>Clockspeed (Ghz)</td>
					<td><input type="number" step="0.01" class="form-control" value="<?php echo $hasil['clockspeed'];?>" name="clockspeed"></td>
				</tr>
				<tr>
					<td>RAM (GB)</td>
					<td><input type="number" class="form-control" value="<?php echo $hasil['ram'];?>" name="ram"></td>
				</tr>
				<tr>
					<td>Storage (GB)</td>
					<td><input type="number" class="form-control" value="<?php echo $hasil['storage'];?>" name="storage"></td>
				</tr>
				<tr>
					<td>Layar</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['layar'];?>" name="layar"></td>
				</tr>
				<tr>
					<td>Graphic</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['grafis'];?>" name="grafis"></td>
				</tr>
				<tr>
					<td>VRAM (GB)</td>
					<td><input type="number" class="form-control" value="<?php echo $hasil['vram'];?>" name="vram"></td>
				</tr>
				<tr>
					<td>OS</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['os'];?>" name="os"></td>
				</tr>
				<tr>
					<td>Warna</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['warna'];?>" name="warna"></td>
				</tr>
				<tr>
					<td>Harga Jual</td>
					<td><input type="number" class="form-control" value="<?php echo $hasil['harga_jual'];?>" name="harga_jual"></td>
				</tr>
				<tr>
					<td>Kondisi</td>
					<td>
					<select id="kondisi" name="kondisi"  class="form-control" required>
						<option value="<?php echo $hasil['kondisi'];?>" selected><?php echo $hasil['kondisi'];?></option>
						<option value="NEW">NEW</option>
						<option value="SECOND">SECOND</option>
					</select>
					</td>
				</tr> 
				<tr>
					<td>Status</td>
					<td>
					<select id="stts" name="stts"  class="form-control" required>
						<option value="<?php echo $hasil['stts'];?>" selected><i><?php echo $hasil['stts'];?></i></option>
						<option value="READY">READY</option>
						<option value="SOLD">SOLD</option>
					</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Simpan</button></td>
				</tr>
			</form>
		</table>
	</div>
</div>