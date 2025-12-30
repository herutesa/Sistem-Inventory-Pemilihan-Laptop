<?php 
$data_aplikasi = $lihat->aplikasi();
$id_aplikasi = isset($_POST['id_aplikasi']) ? $_POST['id_aplikasi'] : '';
$data_laptop = [];
$ranking_laptop = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id_aplikasi != '') {
    $data_laptop = $lihat->laptop_rekomendasi($id_aplikasi);

    // Ambil bobot kriteria dari database berdasarkan id_aplikasi
    $bobot_data = $lihat->get_bobot_kriteria($id_aplikasi);
    if ($bobot_data) {
        $bobot_kriteria = [
            floatval($bobot_data['clockspeed']),
            floatval($bobot_data['ram']),
            floatval($bobot_data['vram']),
            floatval($bobot_data['storage']),
            floatval($bobot_data['harga']),
        ];
    } else {
        $bobot_kriteria = [0, 0, 0, 0, 0]; // fallback kalau data tidak ditemukan
    }

    // Tipe kriteria tetap
    $tipe_kriteria = ['benefit', 'benefit', 'benefit', 'benefit', 'cost'];


    // Ambil nilai dari data laptop
    $nilai_matrix = [];
    foreach ($data_laptop as $laptop) {
        $nilai_matrix[] = [
            floatval($laptop['clockspeed']),
            floatval($laptop['ram']),
            floatval($laptop['vram']),
            floatval($laptop['storage']),
            floatval($laptop['harga_jual'])
        ];
    }

    // 1. Normalisasi
    $pembagi = [];
    for ($j = 0; $j < count($bobot_kriteria); $j++) {
        $sum_kuadrat = 0;
        foreach ($nilai_matrix as $i => $row) {
            $sum_kuadrat += pow($row[$j], 2);
        }
        $pembagi[$j] = sqrt($sum_kuadrat);
    }

    $normalisasi = [];
    foreach ($nilai_matrix as $i => $row) {
        for ($j = 0; $j < count($row); $j++) {
            $normalisasi[$i][$j] = $row[$j] / $pembagi[$j];
        }
    }

    // 2. Normalisasi × Bobot
    $terbobot = [];
    foreach ($normalisasi as $i => $row) {
        foreach ($row as $j => $value) {
            $terbobot[$i][$j] = $value * $bobot_kriteria[$j];
        }
    }

    // 3. Yi = ∑(benefit) - ∑(cost)
    $skor = [];
    foreach ($terbobot as $i => $row) {
        $benefit = 0;
        $cost = 0;
        foreach ($row as $j => $value) {
            if ($tipe_kriteria[$j] == 'benefit') {
                $benefit += $value;
            } else {
                $cost += $value;
            }
        }
        $skor[$i] = $benefit - $cost;
    }

    // 4. Gabungkan skor ke data laptop dan urutkan
    foreach ($data_laptop as $i => $laptop) {
        $laptop['skor'] = $skor[$i];
        $ranking_laptop[] = $laptop;
    }

    usort($ranking_laptop, function($a, $b) {
        return $b['skor'] <=> $a['skor'];
    });
}
?>


<h4>Rekomendasi Laptop (Metode MOORA)</h4>
<br />

<form method="post">
    <div class="form-group">
        <label>Pilih Aplikasi</label>
        <select name="id_aplikasi" class="form-control" required>
            <option value="">-- Pilih Aplikasi --</option>
            <?php foreach ($data_aplikasi as $aplikasi): ?>
                <option value="<?= $aplikasi['id_aplikasi'] ?>" <?= $id_aplikasi == $aplikasi['id_aplikasi'] ? 'selected' : '' ?>>
                    <?= $aplikasi['aplikasi'] ?> (<?= $aplikasi['jenis_aplikasi'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Tampilkan Laptop</button>
</form>

<?php if (!empty($ranking_laptop)): ?>
    <hr />
    <div class="card card-body mt-3">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr style="background:#DFF0D8;color:#333;">
                        <th>Ranking</th>
                        <th>Type</th>
                        <th>Clock Speed (GHz)</th>
                        <th>RAM (GB)</th>
                        <th>VRAM (GB)</th>
                        <th>Storage (GB)</th>
                        <th>Grafis</th>
                        <th>Harga</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rank = 1; foreach($ranking_laptop as $laptop): ?>
                    <tr>
                        <td><?= $rank++ ?></td>
                        <td><?= $laptop['tipe'] ?></td>
                        <td><?= $laptop['clockspeed'] ?></td>
                        <td><?= $laptop['ram'] ?></td>
                        <td><?= $laptop['vram'] ?></td>
                        <td><?= $laptop['storage'] ?></td>
                        <td><?= $laptop['grafis'] ?></td>
                        <td><?= number_format($laptop['harga_jual']) ?></td>
                        <td><?= round($laptop['skor'], 4) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <div class="alert alert-warning mt-3">Tidak ada laptop yang memenuhi spesifikasi aplikasi ini.</div>
<?php endif; ?>
