<?php
session_start();
if (!empty($_SESSION['admin'])) {
    require '../../config.php';
    if (!empty($_GET['pengaturan'])) {
        $nama= htmlentities($_POST['namatoko']);
        $alamat = htmlentities($_POST['alamat']);
        $kontak = htmlentities($_POST['kontak']);
        $pemilik = htmlentities($_POST['pemilik']);
        $id = '1';

        $data[] = $nama;
        $data[] = $alamat;
        $data[] = $kontak;
        $data[] = $pemilik;
        $data[] = $id;
        $sql = 'UPDATE toko SET nama_toko=?, alamat_toko=?, tlp=?, nama_pemilik=? WHERE id_toko = ?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=pengaturan&success=edit-data"</script>';
    }

    if (!empty($_GET['kategori'])) {
        $nama= htmlentities($_POST['kategori']);
        $id= htmlentities($_POST['id']);
        $data[] = $nama;
        $data[] = $id;
        $sql = 'UPDATE kategori SET  nama_kategori=? WHERE id_kategori=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=kategori&uid='.$id.'&success-edit=edit-data"</script>';
    }

    if (!empty($_GET['stok'])) {
        $restok = htmlentities($_POST['restok']);
        $id = htmlentities($_POST['id']);
        $dataS[] = $id;
        $sqlS = 'select*from barang WHERE id_barang=?';
        $rowS = $config -> prepare($sqlS);
        $rowS -> execute($dataS);
        $hasil = $rowS -> fetch();

        $stok = $restok + $hasil['stok'];

        $data[] = $stok;
        $data[] = $id;
        $sql = 'UPDATE barang SET stok=? WHERE id_barang=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=barang&success-stok=stok-data"</script>';
    }

    if (!empty($_GET['barang'])) {
        $id = htmlentities($_POST['id']);
        $tipe = htmlentities($_POST['tipe']);
        $prosesor = htmlentities($_POST['prosesor']);
        $clockspeed = htmlentities($_POST['clockspeed']);
        $ram = htmlentities($_POST['ram']);
        $storage = htmlentities($_POST['storage']);
        $layar = htmlentities($_POST['layar']);
        $grafis = htmlentities($_POST['grafis']);
        $vram = htmlentities($_POST['vram']);
        $os = htmlentities($_POST['os']);
        $warna = htmlentities($_POST['warna']);
        $harga = htmlentities($_POST['harga_jual']);
        $kondisi = htmlentities($_POST['kondisi']);
        $status = htmlentities($_POST['stts']);

        $data = [$tipe, $prosesor, $clockspeed, $ram, $storage, $layar, $grafis, $vram, $os, $warna, $harga, $kondisi, $status, $id];
        
        $sql = 'UPDATE barang 
                SET tipe=?, prosesor=?, clockspeed=?, ram=?, storage=?, layar=?, grafis=?, vram=?, os=?, warna=?, harga_jual=?, kondisi=?, stts=? 
                WHERE id_barang=?';

        try {
            $row = $config->prepare($sql);
            $row->execute($data);
            echo '<script>window.location="../../index.php?page=barang"</script>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if (!empty($_GET['barangs'])) {
        $id = htmlentities($_POST['id']);
        $tipe = htmlentities($_POST['tipe']);
        $prosesor = htmlentities($_POST['prosesor']);
        $clockspeed = htmlentities($_POST['clockspeed']);
        $ram = htmlentities($_POST['ram']);
        $storage = htmlentities($_POST['storage']);
        $layar = htmlentities($_POST['layar']);
        $grafis = htmlentities($_POST['grafis']);
        $vram = htmlentities($_POST['vram']);
        $os = htmlentities($_POST['os']);
        $warna = htmlentities($_POST['warna']);
        $harga = htmlentities($_POST['harga_jual']);
        $kondisi = htmlentities($_POST['kondisi']);
        $status = htmlentities($_POST['stts']);

        $data = [$tipe, $prosesor, $clockspeed, $ram, $storage, $layar, $grafis, $vram, $os, $warna, $harga, $kondisi, $status, $id];
        
        $sql = 'UPDATE barang 
                SET tipe=?, prosesor=?, clockspeed=?, ram=?, storage=?, layar=?, grafis=?, vram=?, os=?, warna=?, harga_jual=?, kondisi=?, stts=? 
                WHERE id_barang=?';

        try {
            $row = $config->prepare($sql);
            $row->execute($data);
            echo '<script>window.location="../../index.php?page=barangsecond"</script>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if (!empty($_GET['customer'])) {
        $id = htmlentities($_POST['id']);
        $nama= htmlentities(htmlentities($_POST['nm_member']));

        $alamat = htmlentities($_POST['alamat_member']);
        $tlp = htmlentities($_POST['telepon']);

        $data[] = $nama;
        $data[] = $alamat;
        $data[] = $tlp;
        $data[] = $id;
        $sql = 'UPDATE member SET nm_member=?,alamat_member=?,telepon=? WHERE id_member=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=customer&uid='.$id.'&success-edit=edit-data"</script>';
    }

    if (!empty($_GET['bobot'])) {
        $id = htmlentities($_POST['id_kategori']);
        $jenis = htmlentities($_POST['jenis_aplikasi']);
        $clockspeed = htmlentities($_POST['clockspeed']);
        $ram = htmlentities($_POST['ram']);
        $vram = htmlentities($_POST['vram']);
        $storage = htmlentities($_POST['storage']);
        $harga = htmlentities($_POST['harga']);

        $data = [$jenis, $clockspeed, $ram, $vram, $storage, $harga, $id];
        
        $sql = 'UPDATE kategori_aplikasi 
                SET jenis_aplikasi=?, clockspeed=?, ram=?, vram=?, storage=?, harga=?
                WHERE id_kategori=?';

        try {
            $row = $config->prepare($sql);
            $row->execute($data);
            echo '<script>window.location="../../index.php?page=bobot"</script>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    if (!empty($_GET['aplikasi'])) {
        // Ambil data dari form
        $id           = htmlentities($_POST['id']);
        $id_kategori  = htmlentities($_POST['id_kategori']);
        $aplikasi     = htmlentities($_POST['aplikasi']);
        $prosesor     = htmlentities($_POST['prosesor']);
        $clockspeed   = htmlentities($_POST['clockspeed']);
        $ram          = htmlentities($_POST['ram']);
        $grafis       = htmlentities($_POST['grafis']);
        $vram         = htmlentities($_POST['vram']);
        $storage      = htmlentities($_POST['storage']);

        // Data array untuk bind parameter
        $data = [$id_kategori, $aplikasi, $prosesor, $clockspeed, $ram, $grafis, $vram, $storage, $id];

        // SQL update
        $sql = 'UPDATE aplikasi 
                SET id_kategori = ?, aplikasi = ?, prosesor = ?, clockspeed = ?, ram = ?, grafis = ?, vram = ?, storage = ?
                WHERE id_aplikasi = ?';

        try {
            $row = $config->prepare($sql);
            $row->execute($data);
            echo '<script>window.location="../../index.php?page=aplikasi&success=edit"</script>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    if (!empty($_GET['gambar'])) {
        $id = htmlentities($_POST['id']);
        set_time_limit(0);
        $allowedImageType = array("image/gif", "image/JPG", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", 'image/webp');
        $filepath = $_FILES['foto']['tmp_name'];
        $fileSize = filesize($filepath);
        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
        $filetype = finfo_file($fileinfo, $filepath);
        $allowedTypes = [
            'image/png'   => 'png',
            'image/jpeg'  => 'jpg',
            'image/gif'   => 'gif',
            'image/jpg'   => 'jpeg',
            'image/webp'  => 'webp'
        ];
        if(!in_array($filetype, array_keys($allowedTypes))) {
            echo '<script>alert("You can only upload JPG, PNG and GIF file");window.location="../../index.php?page=user"</script>';
            exit;
        }else if ($_FILES['foto']["error"] > 0) {
            echo '<script>alert("You can only upload JPG, PNG and GIF file");window.location="../../index.php?page=user"</script>';
            exit;
        } elseif (!in_array($_FILES['foto']["type"], $allowedImageType)) {
            // echo "You can only upload JPG, PNG and GIF file";
            // echo "<font face='Verdana' size='2' ><BR><BR><BR>
            // 		<a href='../../index.php?page=user'>Back to upform</a><BR>";
            echo '<script>alert("You can only upload JPG, PNG and GIF file");window.location="../../index.php?page=user"</script>';
            exit;
        } elseif (round($_FILES['foto']["size"] / 1024) > 4096) {
            // echo "WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB";
            // echo "<font face='Verdana' size='2' ><BR><BR><BR>
            // 		<a href='../../index.php?page=user'>Back to upform</a><BR>";
            echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB");window.location="../../index.php?page=user"</script>';
            exit;
        } else {
            $dir = '../../assets/img/user/';
            $tmp_name = $_FILES['foto']['tmp_name'];
            $name = time().basename($_FILES['foto']['name']);
            if (move_uploaded_file($tmp_name, $dir.$name)) {
                //post foto lama
                $foto2 = $_POST['foto2'];
                //remove foto di direktori
                unlink('../../assets/img/user/'.$foto2.'');
                //input foto
                $id = $_POST['id'];
                $data[] = $name;
                $data[] = $id;
                $sql = 'UPDATE member SET gambar=?  WHERE member.id_member=?';
                $row = $config -> prepare($sql);
                $row -> execute($data);
                echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
            } else {
                echo '<script>alert("Masukan Gambar !");window.location="../../index.php?page=user"</script>';
                exit;
            }
        }
    }

    if (!empty($_GET['profil'])) {
        $id = htmlentities($_POST['id']);
        $nama = htmlentities($_POST['nama']);
        $alamat = htmlentities($_POST['alamat']);
        $tlp = htmlentities($_POST['tlp']);
        $email = htmlentities($_POST['email']);
        $nik = htmlentities($_POST['nik']);

        $data[] = $nama;
        $data[] = $alamat;
        $data[] = $tlp;
        $data[] = $email;
        $data[] = $nik;
        $data[] = $id;
        $sql = 'UPDATE member SET nm_member=?,alamat_member=?,telepon=?,email=?,NIK=? WHERE id_member=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
    }
    
    if (!empty($_GET['pass'])) {
        $id = htmlentities($_POST['id']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);

        $data[] = $user;
        $data[] = $pass;
        $data[] = $id;
        $sql = 'UPDATE login SET user=?,pass=md5(?) WHERE id_member=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=user&success=edit-data"</script>';
    }

    if (!empty($_GET['jual'])) {
        $id = htmlentities($_POST['id']);
        $id_barang = htmlentities($_POST['id_barang']);
        $jumlah = htmlentities($_POST['jumlah']);

        $sql_tampil = "select *from barang where barang.id_barang=?";
        $row_tampil = $config -> prepare($sql_tampil);
        $row_tampil -> execute(array($id_barang));
        $hasil = $row_tampil -> fetch();

        if ($hasil['stok'] > $jumlah) {
            $jual = $hasil['harga_jual'];
            $total = $jual * $jumlah;
            $data1[] = $jumlah;
            $data1[] = $total;
            $data1[] = $id;
            $sql1 = 'UPDATE penjualan SET jumlah=?,total=? WHERE id_penjualan=?';
            $row1 = $config -> prepare($sql1);
            $row1 -> execute($data1);
            echo '<script>window.location="../../index.php?page=jual#keranjang"</script>';
        } else {
            echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
					window.location="../../index.php?page=jual#keranjang"</script>';
        }
    }

    if (!empty($_GET['cari_barang'])) {
        $cari = trim(strip_tags($_POST['keyword']));
        if ($cari == '') {
        } else {
            $sql = "select*from barang where barang.id_barang like '%$cari%' or barang.nama_barang like '%$cari%' ";
            $row = $config -> prepare($sql);
            $row -> execute();
            $hasil1= $row -> fetchAll();
            ?>
		<table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>ID Barang</th>
				<th>Nama Barang</th>
				<th>Harga Jual</th>
				<th>Aksi</th>
			</tr>
		<?php foreach ($hasil1 as $hasil) {?>
			<tr>
				<td><?php echo $hasil['id_barang'];?></td>
				<td><?php echo $hasil['nama_barang'];?></td>
				<td><?php echo $hasil['harga_jual'];?></td>
				<td>
				<a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_barang'];?>" 
					class="btn btn-success">
					<i class="fa fa-shopping-cart"></i></a></td>
			</tr>
		<?php }?>
		</table>
<?php
        }
    }
}
