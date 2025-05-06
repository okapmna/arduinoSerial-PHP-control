<?php
    require_once("serial.php");
    $aksi = $_POST["perintah"];
    echo $aksi;

    var_dump($aksi);

    if($aksi == "1"){
        $respon = kirimPerintahArduino("PORT", $aksi); // Arahkan ke port arduino
        echo "hello".$respon;
    }else{
        $respon = kirimPerintahArduino("PORT", $aksi); // Arahkan ke port arduino
        echo "hello".$respon;
    }
    
?>
