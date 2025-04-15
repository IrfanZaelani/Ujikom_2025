<?php

include_once '../models/m_login.php';

$login = new login();

try {

    if ($_GET['aksi'] == 'register') {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $no = $_POST['no'];

        $alamat = $_POST['alamat'];

        $role = $_POST['role'];

        $login->register($id_user, $username, $pass, $email, $no, $alamat, $role);
    } elseif ($_GET['aksi'] == 'login') {
        $username= $_POST['username'];
        $pass = $_POST['pass'];

        $login->login($username, $pass);
    } elseif ($_GET['aksi'] == 'logout') {
        # code...
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
