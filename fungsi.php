<?php
include_once "config.php";

function cekLogin($user="",$pass=""){
    global $conn;
    
    $sql = "SELECT NIM, password FROM Data_Login WHERE NIM = 'USER'and password='$pass'";
    $result = mysqli_query($conn,$sql);

    if  (mysqli_num_rows($result)>0){
        return true;

    }else{
        return false;
    }
}