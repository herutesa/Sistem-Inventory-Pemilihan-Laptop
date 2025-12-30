<?php 
	$id = $_GET['laporan'];
	$hasil = $lihat -> laporan_edit($id);
?>
<a href="index.php?page=laporan" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Kembali </a>
<h4>Details Penjualan</h4>
<?php if(isset($_GET['success-stok'])){?>
<div class="alert alert-success">
	<p>Tambah Stok Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['success'])){?>
<div class="alert alert-success">
	<p>Tambah Data Berhasil !</p>
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
			<tr>
				<td>ID Penjualan</td>
				<td><?php echo $hasil['id_penjualan'];?></td>
			</tr>
            <tr>
				<td>ID Barang</td>
				<td><?php echo $hasil['id_barang'];?></td>
			</tr>
            <tr>
				<td>Nama Barang</td>
				<td><?php echo $hasil['nama_barang'];?></td>
			</tr>
			<tr>
				<td>Harga Beli</td>
				<td><?php echo $hasil['harga_beli'];?></td>
			</tr>
			<tr>
				<td>Harga Jual</td>
				<td><?php echo $hasil['harga_jual'];?></td>
			</tr>
            <tr>
			<td>Nama Customer</td>
				<td><?php echo $hasil['nm_member'];?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?php echo $hasil['alamat_member'];?></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><?php echo $hasil['telepon'];?></td>
			</tr>
			<tr>
				<td>Tanggal Input</td>
				<td><?php echo $hasil['tanggal_input'];?></td>
			</tr>
		</table>
	</div>
</div>