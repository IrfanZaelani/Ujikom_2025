<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
   
    <style>
        /* Styling Sidebar */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #212529; /* Warna hitam */
            padding-top: 20px;
        }
        .sidebar h4 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            padding: 12px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #343a40;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
        /* Styling Tabel */
        .table-custom {
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table-custom th {
            background-color: #0d6efd;
            color: white;
        }
        .table-custom tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="sidebar">
        <h4>MENU</h4>
        <a href="index.php">🏠 Home</a>
        <a href="task_completed.php">✅ Task Completed</a>
        <?php 
        if ($_SESSION['role'] == 'admin'):?>
        <a href="create.php" class="btn btn-success w-75 mx-auto d-block mt-2">➕ Tambah Data</a>
        <?php endif; ?>
        <a href="logout.php">Logout</a>
    </div>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form action="../controllers/c_user.php?aksi=tambah" method="post">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul:</label>
                            <input type="text" id="judul" name="judul" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select id="status" name="status" class="form-select">
                                <option value="belum selesai">Belum Selesai</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="prioritas" class="form-label">Prioritas:</label>
                            <select id="prioritas" name="prioritas" class="form-select">
                                <option value="penting">Penting</option>
                                <option value="tidak penting">Tidak Penting</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label">Tenggat Waktu:</label>
                            <input type="date" id="deadline" name="deadline" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="dibuat_tgl" class="form-label">Tanggal Dibuat:</label>
                            <input type="date" id="dibuat_tgl" name="dibuat_tgl" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="index.php" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
