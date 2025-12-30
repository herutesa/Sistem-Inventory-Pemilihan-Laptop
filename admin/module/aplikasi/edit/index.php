<?php 
    $id = $_GET['aplikasi'];
    $hasil = $lihat->aplikasi_edit($id); // pastikan fungsi ini sudah ada
?>

<h4>Edit Aplikasi</h4>
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
    <p>Hapus Data Gagal !</p>
</div>
<?php }?>

<div class="card card-body">
    <form action="fungsi/edit/edit.php?aplikasi=edit" method="POST">
        <input type="hidden" name="id" value="<?php echo $hasil['id_aplikasi']; ?>">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="id_kategori" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php
                            $kategoriList = $config->query("SELECT id_kategori, jenis_aplikasi FROM kategori_aplikasi");
                            while ($row = $kategoriList->fetch()) {
                                // Bandingkan dengan id_kategori yang sedang diedit
                                $selected = ($row['id_kategori'] == $hasil['id_kategori']) ? 'selected' : '';
                                echo '<option value="'.$row['id_kategori'].'" '.$selected.'>'.$row['jenis_aplikasi'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Aplikasi</td>
                    <td><input type="text" name="aplikasi" required class="form-control" value="<?php echo $hasil['aplikasi']; ?>"></td>
                </tr>
                <tr>
                    <td>CPU</td>
                    <td><input type="text" name="prosesor" required class="form-control" value="<?php echo $hasil['prosesor']; ?>"></td>
                </tr>
                <tr>
                    <td>Clockspeed (GHz)</td>
                    <td><input type="number" step="0.01" name="clockspeed" required class="form-control" value="<?php echo $hasil['clockspeed']; ?>"></td>
                </tr>
                <tr>
                    <td>RAM (GB)</td>
                    <td><input type="number" name="ram" required class="form-control" value="<?php echo $hasil['ram']; ?>"></td>
                </tr>
                <tr>
                    <td>Graphics</td>
                    <td><input type="text" name="grafis" required class="form-control" value="<?php echo $hasil['grafis']; ?>"></td>
                </tr>
                <tr>
                    <td>VRAM (GB)</td>
                    <td><input type="number" name="vram" required class="form-control" value="<?php echo $hasil['vram']; ?>"></td>
                </tr>
                <tr>
                    <td>Storage (GB)</td>
                    <td><input type="number" name="storage" required class="form-control" value="<?php echo $hasil['storage']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
                </tr>
            </table>
        </div>
    </form>
</div>
