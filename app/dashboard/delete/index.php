<?php

require "../../../_vendor/controllers.php";

$nim = $_POST["nim_delete"];

if(DataMahasiswaController::delete($nim) &&
   DataLoginController::delete($nim)){
    header("Location: ../?delete_status=1");
} else {
    header("Location: ../?delete_status=0");
}

