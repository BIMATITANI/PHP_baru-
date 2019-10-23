<?php

require "../../../_vendor/controllers.php";

$nim_target = $_POST["nim_target"];
$password_target = DataLoginController::get($nim_target)->getPassword();

$nim = $_POST["nim_edit"];
$nama = $_POST["nama_edit"];
$daerah = $_POST["daerah_edit"];

$edited_data_mahasiswa = new DataMahasiswa($nim, $nama, $daerah);
$edited_data_login = new DataLogin($nim, $password_target);

if(DataMahasiswaController::update($nim_target, $edited_data_mahasiswa) &&
   DataLoginController::update($nim_target, $edited_data_login)){
    header("Location: ../?edit_status=1");
} else {
    header("Location: ../?edit_status=0");
}
