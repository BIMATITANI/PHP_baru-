<?php

$iniVarGlobal = "halo";
$iniVarLokal = "test";

function Variable(){
     global $iniVarLokal;
    $iniVarLokal = "kenyang";

}

function tambah($ang1, $ang2){
    // global $iniVarLokal;
    // $iniVarLokal = "kenyang";
    return $ang1+$ang2;

}
function namaSaya($nama=""){
    echo"<div>halo yoga!!</div>";
    return "<b>nama saya : ".$nama."</b>";
}

Variable();
echo $iniVarLokal."<br>";
echo $iniVarGlobal."<br>";
echo tambah(12, 55)."<br>";
echo namaSaya("yoga")."<br>";