<?php

require "config.php";

function get_connection(){
    $conn = mysqli_connect(
        CONFIG::$HOST,
        CONFIG::$USERNAME,
        CONFIG::$PASSWORD,
        CONFIG::$SCHEMA
    );

    return $conn;
}
