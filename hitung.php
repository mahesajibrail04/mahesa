<?php
include 'db.php';

if (!isset($_POST['evidence'])) {
    ?>
    <h6></h6>
    <br><br/>
    <h1>Konsultasi</h1>
    <br><br/>
    <form method="post" onsubmit="return validateForm();">
        <!-- Menampilkan daftar gejala -->
        <table class="table table-sm ">
            <thead>
                <tr>
                    <th scope="col"> Cek </th>
                    <th scope="col" width="50">No</th>
                    <th scope="col">Nama Gejala</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM ds_gejala ORDER BY id ASC";

                $result = $db->query($sql);
                while ($row = $result->fetch_object()) {
                    
                    echo "<tr>
                            <td>
                                <input type='checkbox' name='evidence[]' value='{$row->id}'";
                    echo (isset($_POST['evidence']) && in_array($row->id, $_POST['evidence'])) ? " checked" : "";
                    echo "</td>
                    <td>{$row->kode_gejala}</td>
                    <td>{$row->nama_gejala}</td>
                    <td><img src=\"img/{$row->gambar}\" width=\"250\" height=\"250\"></td>
                    </tr>";

                }
                ?>
            </tbody>
        </table>
        <input class="btn btn-success" type="submit" value="Proses">
    </form>
    <!-- Skrip JavaScript untuk validasi -->
    <script>
        function validateForm() {
            var selectedCount = document.querySelectorAll('input[name="evidence[]"]:checked').length;
            if (selectedCount < 2) {
                alert("Harap pilih setidaknya 2 gejala.");
                return false; // Menghentikan pengiriman formulir
            }
            return true; // Melanjutkan pengiriman formulir
        }
    </script>
    <?php
    // print_r($_POST);
} else {
    // end();
    if (count($_POST['evidence']) < 2 || empty($_POST['evidence']) ) {
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
                        // print($densitas_baru[$k]);
                        // print('fsefse');
                        // print('<br>');
                    }
                }
            }
            foreach ($densitas_baru as $k => $d) {
                if ($k != "&theta;") {
                    $densitas_baru[$k] = $d / (1 - (isset($densitas_baru["&theta;"]) ? $densitas_baru["&theta;"] : 0));
                }
            }

        }

        // print_r($densitas_baru);

        unset($densitas_baru["&theta;"]);
        arsort($densitas_baru);
        echo "<h1></h1>
            <h1>Hasil Konsultasi</h1>";

        echo "<h2>Perangkingan</h2>";
        echo "<pre><b>";
        // print_r($densitas_baru);
        foreach ($densitas_baru as $key => $value) {
            $cf1 = $densitas1[0][1];
            $cf2 = $densitas2[0][1];
            $theta = 1 - $cf2;
            $perhitungan = $cf1 . " + " . $cf2 . " - (" . $cf1 . " X " . $cf2 . ")";
            echo "Perhitungan $key"; echo '<br>';
            echo "$perhitungan\n";
            echo "Hasil: $value\n";
            echo '<br>';
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

        $sqlAll = "SELECT *
                FROM ds_penyakit
                WHERE kode_penyakit IN ('" . implode("','", $final_codes) . "')";
        $result = $db->query($sqlAll);
        $hasil_akhir = $result->fetch_row();

        echo '<img src="img/' . $hasil_akhir[4] . '" width="250" height="250">';

        echo "<h2>Solusi</h2>";
        $sql = "SELECT GROUP_CONCAT(notes)
                FROM ds_penyakit
                WHERE kode_penyakit IN ('" . implode("','", $final_codes) . "')";
        $result = $db->query($sql);
        $hasil_akhir = $result->fetch_row();
        echo nl2br("{$hasil_akhir[0]} ") . "</br>";
        ?>
        <br><br/>
        <a type="button" class="btn btn-danger" href="?m=hitung">Konsultasi Lagi?</a>
        <br><br>
        <?php
    }
}
?>
