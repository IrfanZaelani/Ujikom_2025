<?php
// mmasukan connection.php
include_once "connection.php";
// kelas user 
class user {

    private $koneksi;

    public function __construct() {
        $this->koneksi = new koneksi();
    }
    // function untuk menanmpilak data diurutkan dari id dan prioritas jika itu penting maka ditampilkan pertama
    public function tampil_data($status = null) {
        $sql = "SELECT * FROM task";
        // tambahan jika itu memiliki status seleesai atau tidak
        if ($status) {
            $sql .= " WHERE status = '$status'";
        }
        $sql .= " ORDER BY 
        CASE 
            WHEN prioritas = 'penting' THEN 1 
            ELSE 2 
        END, id";
        
        $query = mysqli_query($this->koneksi->koneksi, $sql);
        
        $result = [];
        while ($data = mysqli_fetch_object($query)) {
            $result[] = $data;
        }
        return $result;
    }
    
// function untk menambah data
    public function tambah($judul,$deskripsi,$status,$prioritas,$deadline,$dibuat_tgl) {
        $sql = "INSERT INTO task (judul, deskripsi, status, prioritas, deadline, dibuat_tgl) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->koneksi->koneksi->prepare($sql);
        $stmt->bind_param("ssssss", $judul, $deskripsi, $status, $prioritas, $deadline, $dibuat_tgl);

         if ($stmt->execute()) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/index.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan');window.location='../views/create.php'</script>";
        }
    }

    public function tampil_data_byid($id) {
        $sql = "SELECT * FROM task WHERE id = ?";
        $stmt = $this->koneksi->koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        return $data;
    }
// function ubah sesuai data yang dikirimkan oleh edit.php untuk mengedit
    public function ubah($id, $judul, $deskripsi, $status, $prioritas, $deadline, $dibuat_tgl) {
        $sql = "UPDATE task SET judul = ?, deskripsi = ?, status = ?, prioritas = ?, deadline = ?, dibuat_tgl = ? WHERE id = ?";
        $stmt = $this->koneksi->koneksi->prepare($sql);
        $stmt->bind_param("ssssssi", $judul, $deskripsi, $status, $prioritas, $deadline, $dibuat_tgl, $id);
    
        if ($stmt->execute()) {
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/index.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Diubah');window.location='../views/edit.php'</script>";
        }
    }
    
// function hapus sesuai id yg dikirim tombol delete di task_completed
    public function hapus($id) {
        $sql = "DELETE FROM task WHERE id = ?";
        $stmt = $this->koneksi->koneksi->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>alert('Data Berhasil Dihapus');window.location='../views/index.php';</script>";
        } else {
            echo "<script>alert('Data Gagal Dihapus');window.location='../views/index.php';</script>";
        }
    }
    //function selesai untuk menadakan task itu selesai
    public function selesai($id) {
        $sql = "UPDATE task SET status = 'selesai', dibuat_tgl = NOW() WHERE id = ?";
        $stmt = $this->koneksi->koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>