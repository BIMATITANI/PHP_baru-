<?php

class DataLogin{
    private $nim;
    private $password;

    function __construct($nim, $password)
    {
        $this->nim = $nim;
        $this->password = $password;
    }

    function getNim(){
        return $this->nim;
    }

    function getPassword(){
        return $this->password;
    }
}

class DataMahasiswa{
    private $nim;
    private $nama;
    private $asal;

    function __construct($nim, $name, $asal)
    {
        $this->nim = $nim;
        $this->name = $name;
        $this->asal = $asal;
    }

    public function getNim()
    {
        return $this->nim;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getAsal()
    {
        return $this->asal;
    }
}
