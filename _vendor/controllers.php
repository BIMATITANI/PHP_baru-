<?php

require "utils.php";
require "database.php";
require "models.php";

class DataLoginController {
    public static function get_all(){                       // READ
        $result = mysqli_query(
            get_connection(),
            "select * from Data_Login"
        );

        if(mysqli_num_rows($result) <= 0) {
            return NULL;
        }

        $data_login = array();
        while($row = mysqli_fetch_array($result)){
            $_data_login_tmp = new DataLogin($row["NIM"], $row["PASSWORD"]);
            array_push($data_login, $_data_login_tmp);
        }

        return $data_login;
    }

    public static function get($nim){                       // READ
        $result = mysqli_query(
            get_connection(),
            "select * from Data_Login where NIM=" . sanitize($nim). ";"
        );

        if(mysqli_num_rows($result) <= 0) {
            return NULL;
        }

        $row = mysqli_fetch_array($result);
        $_data_login_tmp = new DataLogin($row["NIM"], $row["PASSWORD"]);

        return $_data_login_tmp;
    }

    public static function add($data_login){                // CREATE
        $nim = sanitize($data_login->getNim());
        $pass = sanitize($data_login->getPassword());

        return mysqli_query(
            get_connection(),
            "insert into Data_Login values('$nim', '$pass')"
        );
    }

    public static function update($target_nim, $new_data){  // UPDATE
        $target_nim = sanitize($target_nim);
        $new_nim = sanitize($new_data->getNim());
        $new_pass = sanitize($new_data->getPassword());

        return mysqli_query(
            get_connection(),
            "update Data_Login SET NIM='$new_nim', PASSWORD='$new_pass' where NIM='$target_nim'"
        );
    }

    public static function delete($target_nim){             // UPDATE
        $target_nim = sanitize($target_nim);

        return mysqli_query(
            get_connection(),
            "delete from Data_Login where NIM='$target_nim'"
        );
    }
}


class DataMahasiswaController {
    public static function get_all(){                       // READ
        $result = mysqli_query(
            get_connection(),
            "select * from data_mahasiswa"
        );

        if(mysqli_num_rows($result) <= 0) {
            return NULL;
        }

        $data_login = array();
        while($row = mysqli_fetch_array($result)){
            $_data_mahasiswa_tmp = new DataMahasiswa(
                $row["NIM"],
                $row["NAMA"],
                $row["ASAL"]
            );
            array_push($data_login, $_data_mahasiswa_tmp);
        }

        return $data_login;
    }

    public static function get($nim){                       // READ
        $result = mysqli_query(
            get_connection(),
            "select * from data_mahasiswa where NIM=" . sanitize($nim). ";"
        );

        if(mysqli_num_rows($result) <= 0) {
            return NULL;
        }

        $row = mysqli_fetch_array($result);
        $_data_login_tmp = new DataMahasiswa(
            $row["NIM"],
            $row["NAMA"],
            $row["ASAL"]
        );

        return $_data_login_tmp;
    }

    public static function add($data_mahasiswa){                // CREATE
        $nim = sanitize($data_mahasiswa->getNim());
        $nama = sanitize($data_mahasiswa->getNama());
        $asal = sanitize($data_mahasiswa->getAsal());

        return mysqli_query(
            get_connection(),
            "insert into data_mahasiswa values('$nim', '$nama', '$asal')"
        );
    }

    public static function update($target_nim, $new_data){  // UPDATE
        $target_nim = sanitize($target_nim);
        $new_nim = sanitize($new_data->getNim());
        $new_nama = sanitize($new_data->getNama());
        $new_asal = sanitize($new_data->getAsal());

        return mysqli_query(
            get_connection(),
            "update data_mahasiswa SET NIM='$new_nim', NAMA='$new_nama', ASAL='$new_asal' where NIM='$target_nim'"
        );
    }

    public static function delete($target_nim){             // UPDATE
        $target_nim = sanitize($target_nim);

        return mysqli_query(
            get_connection(),
            "delete from data_mahasiswa where NIM='$target_nim'"
        );
    }
}