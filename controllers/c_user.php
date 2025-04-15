<?php
include_once '../models/m_user.php';

$user = new user();

try {
    if (!empty($_GET['aksi'])) {
        $aksi = $_GET['aksi'];
        // jika aksi adlah tambah maka akan menambahkan data
        if ($aksi == 'tambah') {
            $judul = $_POST ['judul'];
            $deskripsi = $_POST ['deskripsi'];
            $status = $_POST ['status'];
            $prioritas = $_POST ['prioritas'];
            $deadline = $_POST ['deadline'];
            $dibuat_tgl = $_POST ['dibuat_tgl'];


            $user->tambah( $judul,$deskripsi,$status,$prioritas,$deadline,$dibuat_tgl);
        } 
        // jika aksi adlaah update maka akaan mengupdate data
        elseif ($aksi == 'update') {
            $id = $_POST['id_user'];
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $status= $_POST['status'];
            $prioritas = $_POST['prioritas'];
            $deadline = $_POST['deadline'];
            $dibuat_tgl = $_POST['dibuat_tgl'];


            $user->ubah($id,$judul,$deskripsi,$status,$prioritas,$deadline,$dibuat_tgl);
        } 
            // jika aksi selesai maka task sudah selesai dikerjakan
        elseif ($aksi == 'selesai') {
            $id = $_GET['id'];
            if ($user->selesai($id)) {
                echo "<script>alert('Tugas berhasil diselesaikan!');window.location='../views/index.php';</script>";
            } else {
                echo "<script>alert('Gagal menyelesaikan tugas!');window.location='../views/index.php';</script>";
            }
            exit();
        }
        // jika aksi adalah hapus maka akan menghapus task
        elseif ($aksi == 'hapus'){
            $id =$_GET ['id'];
            $user->hapus ($id);
        }
    } else {
        
        if (!empty($_GET['status'])) {
            $status = $_GET['status'];
            $pengguna = $user->tampil_data($status);
        } else {
            $pengguna = $user->tampil_data('belum selesai');
        }
        
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>