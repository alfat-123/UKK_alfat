<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Aplikasi Perhitungan Diskon</h3>
            </div>
            <div class="card-body">
                <form id="diskonForm" method="post" action="">
                    <label for="harga" class="form-label">Harga Barang (Rp)</label>
                    <input type="text" name="harga" id="harga" class="form-control" required placeholder="Masukan Harga(Rp)">

                    <label for="diskon" class="form-label">Persentase Diskon (%)</label>
                    <input type="text" name="diskon" id="diskon" class="form-control" required placeholder="Masukan Diskon(%)">
        
                    <button type="submit" name="hitung" class="btn btn-primary">Hitung Diskon</button>
                    <button type="reset" id="resetBtn" class="btn btn-secondary">Reset</button>
                </form>

                <div id="hasilDiskon">
                    <?php
                    //Memformat angkA MENJADI FORMAT RIBUAN 
                    function formatAngka($angka) {
                        return number_format($angka, 2, '.', '.');
                    }

                    function hitungDiskon($hargaInput,$diskon){
                       return $nilaiDiskon = $hargaInput * ( $diskon/ 100);
                        
                    }

                    if (isset($_POST['hitung'])) {
                        
                        //adalah array asosiatif dari semua data yang dikirim dengan metode POST.
                        $hargaInput = $_POST['harga'];
                        $diskon = $_POST['diskon'];

                        //Ganti semua kemunculan string pencarian dengan string pengganti
                        $hargaInput = str_replace(',', '.', $hargaInput);
                        $diskon = str_replace(',', '.', $diskon);

                        //Dapatkan nilai float dari suatu variabel
                        $hargaInput = floatval($hargaInput);
                        $diskon= floatval($diskon);

                        // mengatur harga dan diskon
                        echo '<div class="alert">';
                        if ($hargaInput <= 0) {
                            echo "Harga harus lebih dari 0.";
                        } elseif ( $diskon < 0 ||  $diskon > 100) {
                            echo "Diskon harus antara 0 - 100%.";
                        } else {
                            $nilai_Diskon = hitungDiskon($hargaInput,$diskon);
                            $totalHarga = $hargaInput - $nilai_Diskon;

                            echo '<table>';
                            echo '<tr><td><strong>Harga Awal</strong></td><td>: Rp ' . formatAngka($hargaInput) . '</td></tr>';
                            echo '<tr><td><strong>Diskon</strong></td><td>: ' . formatAngka( $diskon) . ' %</td></tr>';
                            echo '<tr><td><strong>Nilai Diskon</strong></td><td>: Rp ' . formatAngka($nilai_Diskon) . '</td></tr>';
                            echo '<tr><td><strong>Total Harga Setelah Diskon</strong></td><td>: Rp ' . formatAngka($totalHarga) . '</td></tr>';
                            echo '</table>';
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        //untuk meriset hasil perhitungan diskon setelah di tampilkan hasil
        document.getElementById("resetBtn").addEventListener("click", function () {
            document.getElementById("hasilDiskon").innerHTML = "";
        });
    </script>
</body>
</html>
