<?php
function kirimPerintahArduino($port, $perintah) {
    exec("mode $port BAUD=9600 PARITY=N data=8 stop=1 xon=off");

    // Buka koneksi serial
    $fp = @fopen($port, "w");
    if (!$fp) {
        return "Gagal membuka port serial $port";
    }

    // Kirim perintah ke Arduino
    fwrite($fp, $perintah . "\n");

    // Tutup koneksi
    fclose($fp);

    return "Perintah '$perintah' berhasil dikirim ke ESP32 melalui $port";
}

?>