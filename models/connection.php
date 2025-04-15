<?php

class koneksi{
        private $server="localhost"; //ganti dengan server anda jika perlu
        private $username="root"; //ganti dengan username MySQL anda
        private $password=""; //ganti dengan password MySQL anda
        private $db="todo"; //masukan database yang telah anda buat

        public $koneksi; // Variabel koneksi

        function __construct()
        {
                // memnaggil varibel koneksi
                $this->koneksi = mysqli_connect($this->server,$this->username,$this->password,$this->db);

                // if ($this->koneksi) {
                //         // echo "Koneksi ke database " . $this->db . " berhasil";
            
                //         //mengembalikan nilai koneksi jika koneksinya berhasil
                //          return $this->koneksi;
                //     } else {
                //         echo "Koneksi kedatabase gagal !";
                //     }
                // }
        }
    }