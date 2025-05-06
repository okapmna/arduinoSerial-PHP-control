<?php
    require_once("serial.php");
    $aksi = $_POST["perintah"];
    echo $aksi;

    var_dump($aksi);

    if($aksi == "1"){
        $respon = kirimPerintahArduino("/dev/ttyUSB0", $aksi);
        echo "hello".$respon;
    }else{
        $respon = kirimPerintahArduino("/dev/ttyUSB0", $aksi);
        echo "hello".$respon;
    }
    
?>