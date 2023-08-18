<?php
include 'db.php';

if (!isset($_POST['evidence'])) {
    ?>
    <h6>_______________________________</h6>
    <h1>Konsultasi</h1>
    <form method="post">
        <!-- Menampilkan daftar gejala -->
        <table class="table table-sm ">
            <thead>
                <tr>
                    <th scope="col"> Cek </th>
                    <th scope="col" width="50">No</th>
                    <th scope="col">Nama Gejala</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM ds_gejala";
                $result = $db->query($sql);
                while ($row = $result->fetch_object()) {
                    echo "<tr>
                            <td>
                                <input type='checkbox' name='evidence[]' value='{$row->id}'";
                    echo (isset($_POST['evidence']) && in_array($row->id, $_POST['evidence'])) ? " checked" : "";
                    echo "></td>
                            <td>{$row->kode_gejala}</td>
                            <td>{$row->nama_gejala}</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
        <input class="btn btn-success" type="submit" value="Proses">
    </form>
    <?php
} else {
    if (count($_POST['evidence']) < 2) {
        ?>
        <div class="col-md-3">
            <br>
            <div class="alert alert-danger" role="alert"><?php echo "Minimal Pilih 2 Gejala"; ?></div>
        </div>
        <?php
    } else {
        $sql = "SELECT GROUP_CONCAT(b.kode_penyakit), c.cf
                FROM ds_rules a
                JOIN ds_penyakit b ON a.id_problem=b.id
                JOIN ds_gejala c ON a.id_evidence=c.id
                WHERE a.id_evidence IN (" . implode(',', $_POST['evidence']) . ")
                GROUP BY a.id_evidence";
        $result = $db->query($sql);
        $evidence = array();
        while ($row = $result->fetch_row()) {
            $evidence[] = $row;
        }

        $sql = "SELECT GROUP_CONCAT(kode_penyakit) FROM ds_penyakit";
        $result = $db->query($sql);
        $row = $result->fetch_row();
        $fod = $row[0];

        $densitas_baru = array();
        while (!empty($evidence)) {
            $densitas1[0] = array_shift($evidence);
            $densitas1[1] = array($fod, 1 - $densitas1[0][1]);
            $densitas2 = array();
            if (empty($densitas_baru)) {
                $densitas2[0] = array_shift($evidence);
            } else {
                foreach ($densitas_baru as $k => $r) {
                    if ($k != "&theta;") {
                        $densitas2[] = array($k, $r);
                    }
                }
            }

            $theta = 1;
            foreach ($densitas2 as $d) {
                $theta -= $d[1];
            }
            $densitas2[] = array($fod, $theta);
            $m = count($densitas2);
            $densitas_baru = array();
            for ($y = 0; $y < $m; $y++) {
                for ($x = 0; $x < 2; $x++) {
                    if (!($y == $m - 1 && $x == 1)) {
                        $v = explode(',', $densitas1[$x][0]);
                        $w = explode(',', $densitas2[$y][0]);
                        sort($v);
                        sort($w);
                        $vw = array_intersect($v, $w);
                        if (empty($vw)) {
                            $k = "&theta;";
                        } else {
                            $k = implode(',', $vw);
                        }
                        if (!isset($densitas_baru[$k])) {
                            $densitas_baru[$k] = $densitas1[$x][1] * $densitas2[$y][1];
                        } else {
                            $densitas_baru[$k] += $densitas1[$x][1] * $densitas2[$y][1];
                        }
                    }
                }
            }
            foreach ($densitas_baru as $k => $d) {
                if ($k != "&theta;") {
                    $penjelasan = $d . " / (1 - " . (isset($densitas_baru["&theta;"]) ? $densitas_baru["&theta;"] : 0) . ")";
                    $result = $d / (1 - (isset($densitas_baru["&theta;"]) ? $densitas_baru["&theta;"] : 0));
                    $densitas_baru[$k] = $result;
                    $densitas_baru2[$k] = [$result,$penjelasan];
                    echo "Key: $k, Value: $result (Perhitungan: $penjelasan)\n";
                    print('<br>');
                }
            }

            
        }

        // print_r($densitas_baru);

        unset($densitas_baru["&theta;"]);
        arsort($densitas_baru);
        
        unset($densitas_baru2["&theta;"]);
        arsort($densitas_baru2);

        echo "<h1>________________</h1>
            <h1>Hasil Konsultasi</h1>";

        echo "<h2>Perangkingan</h2>";
        echo "<pre><b>";
        // print_r($densitas_baru);
        foreach ($densitas_baru2 as $key => $value) {
            echo "Perhitungan: $key" .'<br>'; 
            echo "$value[1]" .'<br>'; 
            echo "$value[0]" .'<br>'; 
            echo "<br>";
            
            // print_r($value);
        }
        echo "</b></pre>";

        echo "<h2>Penyakit</h2>";
        $codes = array_keys($densitas_baru);
        $final_codes = explode(',', $codes[0]);
        $sql = "SELECT GROUP_CONCAT(nama_penyakit)
                FROM ds_penyakit
                WHERE kode_penyakit IN ('" . implode("','", $final_codes) . "')";
        $result = $db->query($sql);
        $hasil_akhir = $result->fetch_row();
        echo "Terdeteksi penyakit <b>{$hasil_akhir[0]}</b> dengan derajat kepercayaan " . round($densitas_baru[$codes[0]] * 100, 2) . "%</br>";

        echo "<h2>Solusi</h2>";
        $sql = "SELECT GROUP_CONCAT(notes)
                FROM ds_penyakit
                WHERE kode_penyakit IN ('" . implode("','", $final_codes) . "')";
        $result = $db->query($sql);
        $hasil_akhir = $result->fetch_row();
        echo nl2br("{$hasil_akhir[0]} ") . "</br>";
        ?>
        <a type="button" class="btn btn-danger" href="?m=hitung">Konsultasi Lagi !!!</a>
        <?php
    }
}
?>
