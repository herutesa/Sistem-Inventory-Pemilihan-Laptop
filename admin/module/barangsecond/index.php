<h4>Data Laptop Second</h4>
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
        <a href="index.php?page=barangsecond" class="btn btn-success btn-md">
            <i class="fa fa-refresh"></i> Refresh Data</a>
        <div class="clearfix"></div>
<br />
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="example1">
            <thead>
                <tr style="background:#DFF0D8;color:#333;">
                    <th>No</th>
                    <th>Type</th>
                    <th>CPU</th>
                    <th>RAM (GB)</th>
                    <th>Storage (GB)</th>
                    <th>Layar</th>
                    <th>Graphic</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $hasil = $lihat->barangsecond(); 
                foreach($hasil as $isi){
                ?>

                <tr>
                    <td><?php echo $isi['id_barang'];?></td>
                    <td><?php echo $isi['tipe'];?></td>
                    <td><?php echo $isi['prosesor'];?></td>
                    <td><?php echo $isi['ram'];?></td>
                    <td><?php echo $isi['storage'];?></td>
                    <td><?php echo $isi['layar'];?></td>
                    <td><?php echo $isi['grafis'];?></td>
                    <td>Rp.<?php echo number_format($isi['harga_jual']);?>,-</td>
                    <td>
                        <a href="index.php?page=barangsecond/details&barang=<?php echo $isi['id_barang'];?>"><button
                                    class="btn btn-primary btn-xs">Detail</button></a>
                        <a href="index.php?page=barangsecond/edit&barang=<?php echo $isi['id_barang'];?>"><button
                                class="btn btn-warning btn-xs">Edit</button></a>
                        <a href="fungsi/hapus/hapus.php?barangs=hapus&id=<?php echo $isi['id_barang']; ?>"
                        onclick="javascript:return confirm('Hapus Data Laptop ?');">
                        <button class="btn btn-danger btn-xs">Hapus</button></a>
                    </td>   
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
        <!-- end view barang -->
        <!-- tambah barang MODALS-->
        <!-- Modal -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style=" border-radius:0px;">
                    <div class="modal-header" style="background:#285c64;color:#fff;">
                        <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="fungsi/tambah/tambah.php?barangs=tambah" method="POST">
                        <div class="modal-body">
                            <table class="table table-striped bordered">
                                <tr>
                                    <td>Type</td>
                                    <td><input type="text" placeholder="Type" required class="form-control"
                                            name="tipe"></td>
                                </tr> 
                                <tr>
                                    <td>CPU</td>
                                    <td><input type="text" placeholder="CPU" required class="form-control"
                                            name="prosesor"></td>
                                </tr>
                                <tr>
                                    <td>clockspeed (Ghz)</td>
                                    <td><input type="number" step="0.01" placeholder="Clockspeed" required class="form-control"
                                            name="clockspeed"></td>
                                </tr>  
                                <tr>
                                    <td>RAM (GB) </td>
                                    <td><input type="number" placeholder="RAM" required class="form-control"
                                            name="ram"></td>
                                </tr>
                                <tr>
                                    <td>Storage (GB)</td>
                                    <td><input type="number" placeholder="Storage" required class="form-control"
                                            name="storage"></td>
                                </tr>
                                <tr>
                                    <td>Layar</td>
                                    <td><input type="text" placeholder="layar" required class="form-control"
                                            name="layar"></td>
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
                                    <td>OS</td>
                                    <td><input type="text" placeholder="OS" required class="form-control"
                                            name="os"></td>
                                </tr>
                                <tr>
                                    <td>Warna</td>
                                    <td><input type="text" placeholder="Warna" required class="form-control"
                                            name="warna"></td>
                                </tr>
                                <tr>
                                    <td>Harga Jual</td>
                                    <td><input type="number" placeholder="Harga Jual" required class="form-control"
                                            name="harga_jual"></td>
                                </tr>
                                <tr>
                                    <td>Kondisi</td>
                                    <td><input type="text" required readonly="readonly" class="form-control"
                                    name="kondisi" value="SECOND"></td>
                                </tr>   
                                <tr>
                                    <td>Status</td>
                                    <td><input type="text" required readonly="readonly" class="form-control"
                                    name="stts" value="READY"></td>
            
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
