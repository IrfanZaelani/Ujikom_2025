<?php
session_start();
include_once 'connection.php';

class login
{

    function register($id_user, $username, $pass, $email, $no, $alamat,$role)
    {

        $conn = new koneksi();

        $sql = "INSERT INTO user VALUES ('$id_user', '$username', '$pass', '$email','$no', '$alamat','$role')";

        $query = mysqli_query($conn->koneksi, $sql);
        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../index.php'</script>";
        } else {
            echo "<script>alert('Gagal Tambah: " . mysqli_error($conn->koneksi) . "');window.location='../register.php'</script>";
        }
        
    }

    function login($username= null, $pass = null)
    {

        $conn = new koneksi();

        $sql = "SELECT * FROM user WHERE username = '$username'";

        $query = mysqli_query($conn->koneksi, $sql);

        $data = mysqli_fetch_assoc($query);

        //mengecek ada atau tidak datanya
        if ($data) {

            //mengecek kesesuaian password yang diinputkan oleh user, dengan passowrd yang ada didalam tabel user
            if (password_verify($pass, $data['password'])) {
                $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role']; // simpan role di session
            if ($data['role'] == 'admin') {
                header("location:../views/index.php");
            } else if ($data['role'] == 'user') {
                header("location:../views/index.php");
            }
               
            } else {
                echo "<script>alert('Email atau Password Salah');window.location='../index.php'</script>";
            }
        }
    }
}