<?php

session_start();
if (!empty($_SESSION['admin'])) {
    require '../../config.php';
    if (!empty($_GET['kategori'])) {
        $nama= htmlentities(htmlentities($_POST['kategori']));
        $tgl= date("j F Y, G:i");
        $data[] = $nama;
        $data[] = $tgl;
        $sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
    }

    if (!empty($_GET['barang'])) {
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

        $data = [$tipe, $prosesor, $clockspeed, $ram, $storage, $layar, $grafis, $vram, $os, $warna, $harga, $kondisi, $status];
        $sql = 'INSERT INTO barang (tipe,prosesor,clockspeed,ram,storage,layar,grafis,vram,os,warna,harga_jual,kondisi,stts) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';

        try {
            $row = $config->prepare($sql);
            $row->execute($data);
            echo '<script>window.location="../../index.php?page=barang&success=1"</script>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    if (!empty($_GET['barangs'])) {
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

        $data = [$tipe, $prosesor, $clockspeed, $ram, $storage, $layar, $grafis, $vram, $os, $warna, $harga, $kondisi, $status];
        $sql = 'INSERT INTO barang (tipe,prosesor,clockspeed,ram,storage,layar,grafis,vram,os,warna,harga_jual,kondisi,stts) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';

        try {
            $row = $config->prepare($sql);
            $row->execute($data);
            echo '<script>window.location="../../index.php?page=barangsecond&success=1"</script>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    if (!empty($_GET['brand'])) {
        $nama= htmlentities(htmlentities($_POST['nama_brand']));

        $data = [$nama];
        $sql = 'INSERT INTO brand (nama_brand) 
			    VALUES (?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=barang"</script>';
    }

    if (!empty($_GET['brands'])) {
        $nama= htmlentities(htmlentities($_POST['nama_brand']));

        $data[] = $nama;
        $sql = 'INSERT INTO brand (nama_brand) 
			    VALUES (?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=barangsecond"</script>';
    }

    if (!empty($_GET['customer'])) {
        $nama= htmlentities(htmlentities($_POST['nm_member']));
        $alamat = htmlentities($_POST['alamat_member']);
        $telepon = htmlentities($_POST['telepon']);

        $data[] = $nama;
        $data[] = $alamat;
        $data[] = $telepon;
        $sql = 'INSERT INTO member (nm_member,alamat_member,telepon) 
			    VALUES (?,?,?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=customer&&success=tambah-data"</script>';
    }

    if (!empty($_GET['bobot'])) {
        $jenis_aplikasi = htmlentities($_POST['jenis_aplikasi']);
        $clockspeed = htmlentities($_POST['clockspeed']);
        $ram = htmlentities($_POST['ram']);
        $vram = htmlentities($_POST['vram']);
        $storage = htmlentities($_POST['storage']);
        $harga = htmlentities($_POST['harga']);

        $data = [$jenis_aplikasi, $clockspeed, $ram, $vram, $storage, $harga];

        $sql = 'INSERT INTO kategori_aplikasi (jenis_aplikasi,clockspeed,ram,vram,storage,harga) 
			    VALUES (?,?,?,?,?,?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=bobot&&success=tambah-data"</script>';
    }

    if (!empty($_GET['aplikasi'])) {
        $id_kategori = htmlentities($_POST['id_kategori']);
        $aplikasi = htmlentities($_POST['aplikasi']);
        $prosesor = htmlentities($_POST['prosesor']);
        $clockspeed = htmlentities($_POST['clockspeed']);
        $ram = htmlentities($_POST['ram']);
        $grafis = htmlentities($_POST['grafis']);
        $vram = htmlentities($_POST['vram']);
        $storage = htmlentities($_POST['storage']);

        $data = [$id_kategori, $aplikasi, $prosesor, $clockspeed, $ram, $grafis, $vram, $storage];

        $sql = 'INSERT INTO aplikasi (id_kategori, aplikasi, prosesor, clockspeed,ram, grafis,vram,storage) 
			    VALUES (?,?,?,?,?,?,?,?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=aplikasi&&success=tambah-data"</script>';
    }

    if (!empty($_GET['laporan'])) {
        // Ambil data barang dari tabel berdasarkan 'id_barang'
        $id_barang = htmlentities($_POST['barang']);
    
        $sql_barang = 'SELECT * FROM barang WHERE id_barang = ?';
        $stmt_barang = $config->prepare($sql_barang);
        $stmt_barang->execute([$id_barang]);
        $hsl = $stmt_barang->fetch(PDO::FETCH_ASSOC);
    
        // Periksa apakah data barang ditemukan
        if ($hsl) {
            // Dapatkan nilai dari formulir
            $id_member = htmlentities($_POST['member']);
            $total = $hsl['harga_jual'];
            $modal = $hsl['harga_beli'];
            $tgl = htmlentities($_POST['tgl']);
    
            // Siapkan data untuk disimpan ke dalam tabel 'penjualan'
            $data = array($id_barang, $id_member, $total, $modal, $tgl);
    
            // Eksekusi query untuk menyimpan data ke dalam tabel 'penjualan'
            $sql_penjualan = 'INSERT INTO penjualan (id_barang, id_member, total, modal ,tanggal_input) 
                            VALUES (?, ?, ?, ?, ?)';
            $stmt_penjualan = $config->prepare($sql_penjualan);
            $stmt_penjualan->execute($data);
    
            // Perbarui status barang menjadi 'SOLD'
            $sql_update_barang = 'UPDATE barang SET stts = ? WHERE id_barang = ?';
            $stmt_update_barang = $config->prepare($sql_update_barang);
            $stts_sold = 'SOLD';
            $stmt_update_barang->execute([$stts_sold, $id_barang]);
    
            // Kurangi stok pada tabel brand berdasarkan kondisi
            $stok_column = ($hsl['kondisi'] == 'new') ? 'stok_new' : 'stok_second';
            $sql_kurangi_stok = "UPDATE brand SET $stok_column = $stok_column - 1 WHERE id_brand = ?";
            $stmt_kurangi_stok = $config->prepare($sql_kurangi_stok);
            $stmt_kurangi_stok->execute([$hsl['id_brand']]);
    
            echo '<script>window.location="../../index.php?page=laporan&&success=tambah-data"</script>';
        } else {
            echo "Data barang tidak ditemukan.";
        }
    }
    
    
    
    
    if (!empty($_GET['jual'])) {
        $id = $_GET['id'];

        // get tabel barang id_barang
        $sql = 'SELECT * FROM barang WHERE id_barang = ?';
        $row = $config->prepare($sql);
        $row->execute(array($id));
        $hsl = $row->fetch();

        if ($hsl['stok'] > 0) {
            $kasir =  $_GET['id_kasir'];
            $jumlah = 1;
            $total = $hsl['harga_jual'];
            $tgl = date("j F Y, G:i");

            $data1[] = $id;
            $data1[] = $kasir;
            $data1[] = $jumlah;
            $data1[] = $total;
            $data1[] = $tgl;

            $sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
            $row1 = $config -> prepare($sql1);
            $row1 -> execute($data1);

            echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
        } else {
            echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
        }
    }
}
