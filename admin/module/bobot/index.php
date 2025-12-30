<h4>Bobot Kriteria</h4>
<br />
<?php if(isset($_GET['success'])){?>
<div class="alert alert-success">
    <p>Tambah Data Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['success-edit'])){?>
<div class="alert alert-success">
    <p>Update Data Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['remove'])){?>
<div class="alert alert-danger">
    <p>Hapus Data Berhasil !</p>
</div>

<?php }?>
<button type="button" class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Tambah Data</button>
        <a href="index.php?page=bobot" class="btn btn-success btn-md">
            <i class="fa fa-refresh"></i> Refresh Data</a>
        <div class="clearfix"></div>
<br />
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="example1">
            <thead>
                <tr style="background:#DFF0D8;color:#333;">
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Clock Speed</th>
                    <th>RAM</th>
                    <th>VRAM</th>
                    <th>Storage</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				$hasil = $lihat -> kategoriaplikasi();
				foreach($hasil as $isi){
			?>
                <tr>
                    <td><?php echo $isi['id_kategori'];?></td>
                    <td><?php echo $isi['jenis_aplikasi'];?></td>
                    <td><?php echo $isi['clockspeed'];?></td>
                    <td><?php echo $isi['ram'];?></td>
                    <td><?php echo $isi['vram'];?></td>
                    <td><?php echo $isi['storage'];?></td>
                    <td><?php echo $isi['harga'];?></td>
                    <td>
                        <a href="index.php?page=bobot/edit&bobot=<?php echo $isi['id_kategori'];?>"><button
                                class="btn btn-warning">Edit</button></a>
                        <a href="fungsi/hapus/hapus.php?bobot=hapus&id=<?php echo $isi['id_kategori'];?>"
                            onclick="javascript:return confirm('Hapus Data Bobot ?');">
                            <button class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
                <?php ; }?>
            </tbody>
        </table>
    </div>
</div>
        <!-- tambah kategori MODALS-->
        <!-- Modal -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style=" border-radius:0px;">
                    <div class="modal-header" style="background:#285c64;color:#fff;">
                        <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Bobot</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="fungsi/tambah/tambah.php?bobot=tambah" method="POST">
                        <div class="modal-body">
                            <table class="table table-striped bordered">
                                <tr>
                                    <td>Kategori</td>
                                    <td><input type="text" placeholder="Kategori" required class="form-control"
                                            name="jenis_aplikasi"></td>
                                </tr>
                                <tr>
                                    <td>Clockspeed</td>
                                    <td><input type="number" step="0.01" placeholder="Clockspeed" required class="form-control"
                                            name="clockspeed"></td>
                                </tr>
                                <tr>
                                    <td>RAM</td>
                                    <td><input type="number" step="0.01" placeholder="RAM" required class="form-control"
                                            name="ram"></td>
                                </tr>
                                <tr>
                                    <td>VRAM</td>
                                    <td><input type="number" step="0.01" placeholder="VRAM" required class="form-control"
                                            name="vram"></td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td><input type="number" step="0.01" placeholder="Storage" required class="form-control"
                                            name="storage"></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><input type="number" step="0.01" placeholder="Harga" required class="form-control"
                                            name="harga"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>