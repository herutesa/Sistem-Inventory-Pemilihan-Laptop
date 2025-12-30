<?php 
	$id = $_GET['barang'];
	$hasil = $lihat -> barang_edit($id);
?>

<h4>Detail Laptop Baru</h4>
<br>
<a href="#" onclick="goBack()" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Kembali </a>
<script>
function goBack() {
    // Mendapatkan halaman sebelumnya dari riwayat browser
    window.history.back();
}
</script>


<div class="card card-body">
	<div class="table-responsive">
		<table class="table table-striped">
			<tr>
				<td>Tipe</td>
				<td><?php echo $hasil['tipe'];?></td>
			</tr>
			<tr>
				<td>CPU</td>
				<td><?php echo $hasil['prosesor'];?></td>
			</tr>
				<td>Clockspeed (Ghz)</td>
				<td><?php echo $hasil['clockspeed'];?></td>
			</tr>
			<tr>
				<td>RAM (GB)</td>
				<td><?php echo $hasil['ram'];?></td>
			</tr>
	
			<tr>
				<td>Storage (GB)</td>
				<td><?php echo $hasil['storage'];?></td>
			</tr>
			<tr>
				<td>layar</td>
				<td><?php echo $hasil['layar'];?></td>
			</tr>
			<tr>
				<td>Graphich</td>
				<td><?php echo $hasil['grafis'];?></td>
			</tr>
			<tr>
				<td>VRAM (GB)</td>
				<td><?php echo $hasil['vram'];?></td>
			</tr>
			<tr>
				<td>OS</td>
				<td><?php echo $hasil['os'];?></td>
			</tr>
			<tr>
				<td>Warna</td>
				<td><?php echo $hasil['warna'];?></td>
			</tr>
			<tr>
				<td>Harga Jual</td>
				<td><?php echo $hasil['harga_jual'];?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php echo $hasil['stts'];?></td>
			</tr>
		</table>
	</div>
</div>