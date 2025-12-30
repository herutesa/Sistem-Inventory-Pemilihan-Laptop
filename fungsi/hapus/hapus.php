<?php

session_start();
if (!empty($_SESSION['admin'])) {
    require '../../config.php';

    if (!empty(htmlentities($_GET['barang']))) {
        $id = htmlentities($_GET['id']);
    
        // Eksekusi query untuk menghapus data dari tabel 'barang'
        $sql_hapus_barang = 'DELETE FROM barang WHERE id_barang = ?';
        $stmt_hapus_barang = $config->prepare($sql_hapus_barang);
        $stmt_hapus_barang->execute([$id]);
    
        // Redirect kembali ke halaman dengan parameter brand
        echo '<script>window.location="../../index.php?page=barang"</script>';
    }
    
    
    
    if (!empty(htmlentities($_GET['barangs']))) {
        $id = htmlentities($_GET['id']);
    
        // Eksekusi query untuk menghapus data dari tabel 'barang'
        $sql_hapus_barang = 'DELETE FROM barang WHERE id_barang = ?';
        $stmt_hapus_barang = $config->prepare($sql_hapus_barang);
        $stmt_hapus_barang->execute([$id]);
    
        // Redirect kembali ke halaman dengan parameter brand
        echo '<script>window.location="../../index.php?page=barangsecond"</script>';
    }

    if (!empty(htmlentities($_GET['customer']))) {
        $id= htmlentities($_GET['id']);
        $data[] = $id;
        $sql = 'DELETE FROM member WHERE id_member=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=customer"</script>';
    }

    if (!empty(htmlentities($_GET['bobot']))) {
        $id= htmlentities($_GET['id']);
        $data[] = $id;
        $sql = 'DELETE FROM kategori_aplikasi WHERE id_kategori=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=bobot"</script>';
    }

    if (!empty(htmlentities($_GET['aplikasi']))) {
        $id= htmlentities($_GET['id']);
        $data[] = $id;
        $sql = 'DELETE FROM aplikasi WHERE id_aplikasi=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=aplikasi"</script>';
    }

    if (!empty(htmlentities($_GET['laporan']))) {
        $id= htmlentities($_GET['id']);
        $data[] = $id;
        $sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=laporan&&remove=hapus-data"</script>';
    }
    

    if (!empty(htmlentities($_GET['jual']))) {
        $dataI[] = htmlentities($_GET['brg']);
        $sqlI = 'select*from barang where id_barang=?';
        $rowI = $config -> prepare($sqlI);
        $rowI -> execute($dataI);
        $hasil = $rowI -> fetch();

        /*$jml = htmlentities($_GET['jml']) + $hasil['stok'];

        $dataU[] = $jml;
        $dataU[] = htmlentities($_GET['brg']);
        $sqlU = 'UPDATE barang SET stok =? where id_barang=?';
        $rowU = $config -> prepare($sqlU);
        $rowU -> execute($dataU);*/

        $id = htmlentities($_GET['id']);
        $data[] = $id;
        $sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=jual"</script>';
    }

    if (!empty(htmlentities($_GET['penjualan']))) {
        $sql = 'DELETE FROM penjualan';
        $row = $config -> prepare($sql);
        $row -> execute();
        echo '<script>window.location="../../index.php?page=jual"</script>';
    }
    

}
