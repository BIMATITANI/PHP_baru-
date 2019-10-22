<?php
$name = $_POST["nisn_login"];
$pass =  $_POST["password_login"];


if ($name==="yota"&& $pass==="crot"){
    echo "anda berhasil masuk";
}
else{
     echo "gagal";
}

?>