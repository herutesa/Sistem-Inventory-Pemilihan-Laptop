<?php
/*
* PROSES TAMPIL
*/
class view
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function member()
    {
        $sql = "select member.*, login.*
                from member inner join login on member.id_member = login.id_member";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function member_edit($id)
    {
        $sql = "select member.*, login.*
                from member inner join login on member.id_member = login.id_member
                where member.id_member= ?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $hasil = $row -> fetch();
        return $hasil;
    }

    public function toko()
    {
        $sql = "select*from toko where id_toko='1'";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetch();
        return $hasil;
    }

    public function kategoriaplikasi()
    {
        $sql = "select*from kategori_aplikasi";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function aplikasi()
    {
        $sql = "SELECT a.*, k.jenis_aplikasi 
                FROM aplikasi a 
                JOIN kategori_aplikasi k ON a.id_kategori = k.id_kategori 
                ORDER BY a.id_aplikasi ASC";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }    

    public function customer()
    {
        $sql = "select*from member";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function customer_edit($id)
    {
        $sql = "select*from member where id_member= ?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $hasil = $row -> fetch();
        return $hasil;
    }

    public function barang()
    {
        $sql = "select*from barang";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function barangnew()
    {
        $condition = 'NEW';
        $stts = 'READY';

        $sql = 'SELECT * FROM barang 
                WHERE kondisi = ? AND stts = ?';

        $row = $this->db->prepare($sql);
        $row->execute([$condition, $stts]);

        return $row->fetchAll();
    }


    public function barangsecond()
    {
        $condition = 'SECOND';
        $stts = 'READY';
       
        $sql = 'SELECT * FROM barang 
                WHERE kondisi = ? AND stts = ?';

        $row = $this->db->prepare($sql);
        $row->execute([$condition, $stts]);

        return $row->fetchAll();
    }

    public function bobot_edit($id)
    {
        $sql = "select*from kategori_aplikasi where id_kategori= ?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $hasil = $row -> fetch();
        return $hasil;
    }

    public function aplikasi_edit($id)
    {
        $sql = "SELECT a.*, k.jenis_aplikasi 
                FROM aplikasi a 
                JOIN kategori_aplikasi k ON a.id_kategori = k.id_kategori 
                WHERE a.id_aplikasi = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($id));
        $hasil = $row->fetch();
        return $hasil;
    }


    public function brandheader($id)
    {
        $sql = "select*from brand where id_brand=?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function brand()
    {
        $sql = "select*from brand";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function brand_edit($id)
    {
        $sql = "select*from brand
                where id_brand=?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $hasil = $row -> fetch();
        return $hasil;
    }

    public function barang_edit($id)
    {
        $sql = "select*from barang
                where id_barang=?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $hasil = $row -> fetch();
        return $hasil;
    }

    public function laporan_edit($id)
    {
        $sql = "SELECT *FROM penjualan
        INNER JOIN barang ON penjualan.id_barang = barang.id_barang
        INNER JOIN member ON penjualan.id_member = member.id_member
        WHERE id_penjualan=?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $hasil = $row -> fetch();
        return $hasil;
    }

    public function barang_cari($cari)
    {
        $sql = "select*from barang
                where id_barang like '%$cari%' or nama_barang like '%$cari%'";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function barang_id()
    {
        $sql = 'SELECT * FROM barang ORDER BY id DESC';
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetch();

        $urut = substr($hasil['id_barang'], 2, 3);
        $tambah = (int) $urut + 1;
        if (strlen($tambah) == 1) {
            $format = 'BR00'.$tambah.'';
        } elseif (strlen($tambah) == 2) {
            $format = 'BR0'.$tambah.'';
        } else {
            $ex = explode('BR', $hasil['id_barang']);
            $no = (int) $ex[1] + 1;
            $format = 'BR'.$no.'';
        }
        return $format;
    }

    public function kategori_edit($id)
    {
        $sql = "select*from kategori where id_kategori=?";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($id));
        $hasil = $row -> fetch();
        return $hasil;
    }


    
    public function customer_row()
    {
        $sql = "SELECT * FROM member";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> rowCount();
        return $hasil;
    }


    public function barang_row()
    {
        $sql = "SELECT * FROM barang WHERE stts = 'READY'";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> rowCount();
        return $hasil;
    }

    public function stoknew_row($id)
    {
        $sql = "SELECT * FROM barang WHERE id_brand = ? AND kondisi = 'NEW' AND stts = 'READY'";
        $row = $this-> db -> prepare($sql);
        $row -> execute([$id]);
        $hasil = $row -> rowCount();
        return $hasil;
    }

    public function stoksecond_row($id)
    {
        $sql = "SELECT * FROM barang WHERE id_brand = ? AND kondisi = 'SECOND' AND stts = 'READY'";
        $row = $this-> db -> prepare($sql);
        $row -> execute([$id]);
        $hasil = $row -> rowCount();
        return $hasil;
    }
    

    public function penjualan_row()
    {
        $sql = "SELECT * FROM penjualan";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> rowCount();
        return $hasil;
    }


    public function periode_jual($periode)
    {
        $sql ="SELECT penjualan.* , barang.id_barang, barang.nama_barang, barang.harga_beli, member.id_member,
                member.nm_member from penjualan 
                left join barang on barang.id_barang=penjualan.id_barang 
                left join member on member.id_member=penjualan.id_member WHERE penjualan.periode = ? 
                ORDER BY id_penjualan ASC";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($periode));
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function hari_jual($hari)
    {
        $ex = explode('-', $hari);
        $monthNum  = $ex[1];
        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
        if ($ex[2] > 9) {
            $tgl = $ex[2];
        } else {
            $tgl1 = explode('0', $ex[2]);
            $tgl = $tgl1[1];
        }
        $cek = $tgl.' '.$monthName.' '.$ex[0];
        $param = "%{$cek}%";
        $sql ="SELECT penjualan.* , barang.id_barang, barang.nama_barang,  barang.harga_beli, member.id_member,
                member.nm_member from penjualan 
                left join barang on barang.id_barang=penjualan.id_barang 
                left join member on member.id_member=penjualan.id_member WHERE penjualan.tanggal_input LIKE ? 
                ORDER BY id_penjualan ASC";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($param));
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function penjualan()
    {
        $sql ="SELECT penjualan.* , barang.id_barang, barang.nama_barang, member.id_member,
                member.nm_member from penjualan 
                left join barang on barang.id_barang=penjualan.id_barang 
                left join member on member.id_member=penjualan.id_member
                ORDER BY id_penjualan";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function laptop_rekomendasi($id_aplikasi)
    {
        $sql = "SELECT b.* 
                FROM barang b, aplikasi a
                WHERE a.id_aplikasi = ?
                AND b.clockspeed >= a.clockspeed 
                AND b.ram >= a.ram 
                AND b.vram >= a.vram 
                AND b.storage >= a.storage
                AND b.stts = 'READY'";

        $row = $this->db->prepare($sql);
        $row->execute([$id_aplikasi]);
        return $row->fetchAll();
    }

    
    public function get_bobot_kriteria($id_aplikasi) {
        $sql = "SELECT k.clockspeed, k.ram, k.vram, k.storage, k.harga
                FROM aplikasi a
                JOIN kategori_aplikasi k ON a.id_kategori = k.id_kategori
                WHERE a.id_aplikasi = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_aplikasi]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    
    

}

