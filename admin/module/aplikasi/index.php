<h4>Data Aplikasi (Spesifikasi Minimum)</h4>
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
        <a href="index.php?page=aplikasi" class="btn btn-success btn-md">
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
                    <th>Aplikasi</th>
                    <th>Processor</th>
                    <th>Clock Speed (GHz)</th>
                    <th>RAM (GB)</th>
                    <th>Graphics</th>
                    <th>VRAM (GB)</th>
                    <th>Storage (GB)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				$hasil = $lihat -> aplikasi();
				$no=1;
				foreach($hasil as $isi){
			?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $isi['jenis_aplikasi'];?></td>
                    <td><?php echo $isi['aplikasi'];?></td>
                    <td><?php echo $isi['prosesor'];?></td>
                    <td><?php echo $isi['clockspeed'];?></td>
                    <td><?php echo $isi['ram'];?></td>
                    <td><?php echo $isi['grafis'];?></td>
                    <td><?php echo $isi['vram'];?></td>
                    <td><?php echo $isi['storage'];?></td>
                    <td>
                        <a href="index.php?page=aplikasi/edit&aplikasi=<?php echo $isi['id_aplikasi'];?>"><button
                                class="btn btn-warning">Edit</button></a>
                        <a href="fungsi/hapus/hapus.php?aplikasi=hapus&id=<?php echo $isi['id_aplikasi'];?>"
                            onclick="javascript:return confirm('Hapus Data Aplikasi ?');">
                            <button class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
                <?php $no++; }?>
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
                        <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Aplikasi</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="fungsi/tambah/tambah.php?aplikasi=tambah" method="POST">
                        <div class="modal-body">
                            <table class="table table-striped bordered">
                                <tr>
                                    <td>Kategori</td>
                                    <td>
                                        <select name="id_kategori" class="form-control" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <?php
                                            // Asumsikan $kategoriList adalah hasil query dari tabel kategori
                                            $kategoriList = $config->query("SELECT id_kategori, jenis_aplikasi FROM kategori_aplikasi");
                                            while ($row = $kategoriList->fetch()) {
                                                echo '<option value="'.$row['id_kategori'].'">'.$row['jenis_aplikasi'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aplikasi</td>
                                    <td><input type="text" placeholder="Aplikasi" required class="form-control"
                                            name="aplikasi"></td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td><input type="text" placeholder="prosesor" required class="form-control"
                                            name="prosesor"></td>
                                </tr>
                                <tr>
                                    <td>Clockspeed (Ghz)</td>
                                    <td><input type="number" step="0.01" placeholder="Clockspeed" required class="form-control"
                                            name="clockspeed"></td>
                                </tr>
                                <tr>
                                    <td>RAM (GB)</td>
                                    <td><input type="number" placeholder="RAM" required class="form-control"
                                            name="ram"></td>
                                </tr>
                                <tr>
                                    <td>Graphich</td>
                                    <td><input type="text" placeholder="Graphich" required class="form-control"
                                            name="grafis"></td>
                                </tr>
                                <tr>
                                    <td>VRAM (GB)</td>
                                    <td><input type="number" placeholder="VRAM" required class="form-control"
                                            name="vram"></td>
                                </tr>
                                <tr>
                                    <td>Storage (GB)</td>
                                    <td><input type="number" placeholder="Storage" required class="form-control"
                                            name="storage"></td>
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