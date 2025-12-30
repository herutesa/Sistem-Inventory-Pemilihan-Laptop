<h4>Data Penjualan</h4>
        <br />
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
		 <button type="button" class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Tambah Data</button>
        <a href="index.php?page=laporan" class="btn btn-success btn-md">
            <i class="fa fa-refresh"></i> Refresh Data</a>
        <a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
            Excel</a>


        <div class="clearfix"></div>

		<br />
         <!-- view barang -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered w-100 table-sm" id="example1">
						<thead>
							<tr style="background:#DFF0D8;color:#333;">
								<th>No.</th>
								<th>ID Barang</th>
								<th>Customer</th>
								<th>Harga</th>
								<th>Modal</th>
								<th>Tanggal</th>
								<th>Aksi</th>
							</tr>
						</thead>
					<tbody>
						<?php 
						$hasil = $lihat -> penjualan();
						$no=1;
						foreach($hasil as $isi){
					?>
                <tr>
                    <td><?php echo $no;?></td>
					<td><?php echo $isi['id_barang'];?></td>
					<td><?php echo $isi['nm_member'];?></td>
					<td>Rp.<?php echo number_format($isi['total']);?>,</td>
					<td>Rp.<?php echo number_format($isi['modal']);?>,</td>
                    <td><?php echo $isi['tanggal_input'];?></td>
                    <td>
						<a href="index.php?page=laporan/details&laporan=<?php echo $isi['id_penjualan'];?>"><button
											class="btn btn-primary btn-xs">Details</button></a>
                        <a href="fungsi/hapus/hapus.php?laporan=hapus&id=<?php echo $isi['id_penjualan'];?>"
                            onclick="javascript:return confirm('Hapus Data laporan ?');"><button
                                class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
                <?php $no++; }?>
            </tbody>
						<tfoot>
						<?php
							// Hitung nilai variabel sebelumnya
							$bayar = 0;
							$modal = 0;

							$hasil = $lihat->penjualan();
							foreach ($hasil as $isi) {
								$bayar += $isi['total'];
								$modal += $isi['modal'];
							}
							?>
							<tr>
								<th colspan="3">Total </td>
								<th>Rp.<?php echo number_format($bayar);?>,-</th>
								<th>Rp.<?php echo number_format($modal);?>,-</th>
								<th style="background:#0bb365;color:#fff;">Keuntungan</th>
								<th style="background:#0bb365;color:#fff;">
									Rp.<?php echo number_format($bayar-$modal);?>,-</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
     </div>
 </div>

        <!-- tambah kategori MODALS-->
        <!-- Modal -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style=" border-radius:0px;">
                    <div class="modal-header" style="background:#285c64;color:#fff;">
                        <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="fungsi/tambah/tambah.php?laporan=tambah" method="POST">
                        <div class="modal-body">
                            <table class="table table-striped bordered">
                                <tr>
                                    <td>ID Barang</td>
                                    <td>                                       
                                        <select name="barang" class="form-control" required>
                                            <option value="#">Pilih Barang</option>
                                            <?php  $bar = $lihat -> barang(); foreach($bar as $isi){ 	?>
                                            <option value="<?php echo $isi['id_barang'];?>">
                                                <?php echo $isi['id_barang'];?></option>
                                            <?php }?>
                                        </select></td>
                                </tr>
								<tr>
                                    <td>ID Member</td>
                                    <td>                                       
                                        <select name="member" class="form-control" required>
                                            <option value="#">Pilih Customer</option>
                                            <?php  $bar = $lihat -> customer(); foreach($bar as $isi){ 	?>
                                            <option value="<?php echo $isi['id_member'];?>">
                                                <?php echo $isi['nm_member'];?></option>
                                            <?php }?>
                                        </select></td>
                                </tr>
								<tr>
                                    <td>Tanggal Input</td>
                                    <td><input type="text" required readonly="readonly" class="form-control"
                                            value="<?php echo  date("j F Y, G:i");?>" name="tgl"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert
                                Data</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>