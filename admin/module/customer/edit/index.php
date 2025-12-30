 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <?php 
	$id = $_GET['customer'];
	$hasil = $lihat -> customer_edit($id);
?>
 <a href="index.php?page=customer" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Kembali </a>
 <h4>Edit Customer</h4>
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
			<form action="fungsi/edit/edit.php?customer=edit" method="POST">
                   <tr>
					<td>ID Member</td>
					<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_member'];?>"
							name="id"></td>
				</tr>
                <td>Nama Customer</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['nm_member'];?>" name="nm_member"></td>
				</tr>
				<td>Alamat</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['alamat_member'];?>" name="alamat_member"></td>
				</tr>
				<td>Telepon</td>
					<td><input type="text" class="form-control" value="<?php echo $hasil['telepon'];?>" name="telepon"></td>
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