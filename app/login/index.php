<?php

require "../../_vendor/controllers.php";

function check_login($nim, $pass){
    // check 1
    $login = DataLoginController::get($nim);
    if($login === NULL){
        return false;
    } else {
        if($login->getNim() === $nim && $login->getPassword() === $pass){
            return true;
        }
    }

    // check 2
    $login = DataLoginController::get_all();
    foreach($login as $dl){
        if($dl->getNim() === $nim && $dl->getPassword() === $pass){
            return true;
        }
    }

    return false;
}

$nim = $_POST["nim_login"];
$pass = $_POST["password_login"];

if(!check_login($nim, $pass)){
    header("Location: ../?page=login&login_status=0");
} else {
    session_start();
    $_SESSION["nim"] = $nim;

    header("Location: ../dashboard");
}
?>