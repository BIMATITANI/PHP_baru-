<?php

require "../../_vendor/controllers.php";

// ngecek kalau nim sudah dipakai
// cek 1
function check1($check_nim){
    return DataMahasiswaController::get($check_nim) == NULL && DataLoginController::get($check_nim) == NULL;
}

// cek 2
function check_list_mahasiswa($nim){
    $data_mahasiswa = DataMahasiswaController::get_all();
    if($data_mahasiswa == NULL) {
        return true;
    }

    foreach ($data_mahasiswa as $m)
        if ($m->getNim() == $nim) return false;

    return true;
}

function check_list_data_login($nim){
    $data_data_login = DataLoginController::get_all();
    if($data_data_login == NULL) {
        return true;
    }

    foreach($data_data_login as $dl)
        if($dl->getNim() == $nim) return false;

    return true;
}

function check2($check_nim){
    return check_list_mahasiswa($check_nim) && check_list_data_login($check_nim);
}

function check_all($nim){
    return check1($nim) && check2($nim);
}
//-------



$nim = $_POST["nim_register"];
$nama = $_POST["nama_register"];
$asal = $_POST["daerah_register"];
$pass = $_POST["password_register"];
$confirm = $_POST["confirm_register"];


if($pass !== $confirm){
    header("Location: ../?page=register&reg_password=1&login_status=2");
    die();
}

if(!check_all($nim)){
    header("Location: ../?page=register&reg_nim=1&login_status=2");
    die();
}

$new_data_login = new DataLogin($nim, $pass);
$new_data_mahasiswa = new DataMahasiswa($nim, $nama, $asal);

if (DataLoginController::add($new_data_login) &&
    DataMahasiswaController::add($new_data_mahasiswa)){
    header("Location: ../?page=login&login_status=1");
    die();
} else {
    header("Location: ../?page=register&login_status=2");
    die();
}
