<?php 
echo "Selamat datang di bioskop\n";
echo "Harga Tiket : \n";
echo "1. Dewasa : Rp. 50.000 \n2. Anak-anak: Rp. 30.000 \n";
$menu = (int) readline("Pilih Tiket :");
    // Validasi input jenis tiket
    if ($menu != 1 && $menu != 2) {
        echo "Error: Pilihan jenis tiket tidak valid. Silakan pilih 1 untuk Dewasa atau 2 untuk Anak-anak.\n";
        exit();
    }
$tiket = (int) readline("Jumlah Tiket :");
    // Validasi jumlah tiket
    if ($tiket < 0) {
        echo "Error: Jumlah tiket tidak bisa kurang dari 0.\n";
        exit();
    }

$hariValid = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];
$hari = readline("Pilih Hari:");
    // Validasi input hari
    if (!in_array(strtolower($hari), $hariValid)) {
        echo "Error: Nama hari tidak valid. Silakan masukkan nama hari yang benar.\n";
        exit();
    }

jenisTiket($menu, $tiket, $hari);

function jenisTiket($menu, $tiket, $hari) {
    $hargaDewasa = 50000;
    $hargaAnak = 30000;
    $biayaTambahan = 0;
    $diskonThreshold = 150000;
    $diskonPersen = 0.10;

    // Tambahan biaya jika hari adalah Sabtu atau Minggu
    if (strtolower($hari) == "sabtu" || strtolower($hari) == "minggu") {
        $biayaTambahan = 10000;
    }

    // Hitung total berdasarkan jenis tiket
    if ($menu == 1) {
        $total = ($hargaDewasa + $biayaTambahan) * $tiket;
    } else {
        $total = ($hargaAnak + $biayaTambahan) * $tiket;
    }

    // Terapkan diskon jika total melebihi threshold
    if ($total > $diskonThreshold) {
        $diskon = $total * $diskonPersen;
        $total -= $diskon;
        echo "Total Bayar setelah diskon: Rp. $total\n";
    } else {
        echo "Total Bayar : Rp. $total\n";
    }
}
?>
