<h3>Dashboard</h3>
<br/>

<?php $hasil_barang = $lihat -> barang_row();?>
<?php $hasil_customer = $lihat -> customer_row();?>
<?php $hasil_penjualan = $lihat -> penjualan_row();?>
<div class="row">

    <!--STATUS cardS -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fa fa-laptop"></i> Stok Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($hasil_barang);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=barang'>Data
                    Barang <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <!-- STATUS cardS -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fas fa-upload"></i> Telah Terjual</h6>
            </div>
            <div class="card-body">
                <center>
                <h1><?php echo number_format($hasil_penjualan);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=penjualan'>Data Penjualan <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fa fa-users"></i> Customer</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($hasil_customer);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=customer'>Data
                    Customer <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
</div>