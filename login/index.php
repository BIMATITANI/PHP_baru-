<?php

require "../_vendor/controllers.php";

$nim = $_POST["nim_login"];
$pass = $_POST["password_login"];

// check 1
$login = DataLoginController::get($nim);
if($login === NULL){
    echo "Cek 1 Gagal";
} else {
    if($login->getNim() === $nim && $login->getPassword() === $pass){
        echo "Cek 1 Berhasil";
        session_start();
        $_SESSION["nim"] = $nim;
        die();
    } else {
        echo "Cek 1 GAGAL";
    }
}

// check 2
$login = DataLoginController::get_all();
foreach($login as $dl){
    if($dl->getNim() === $nim && $dl->getPassword() === $pass){
        echo "Cek 2 Berhasil";
        session_start();
        $_SESSION["nim"] = $nim;
        die();
    }
}
echo "Cek 2 Gagal";
die();

?>