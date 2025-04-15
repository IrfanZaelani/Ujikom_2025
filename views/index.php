<?php
session_start();
include "../controllers/c_user.php";
$status = 'belum selesai';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling Sidebar */
       

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #212529;
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
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* Styling Tabel */
        .table-custom {
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .table-custom th {
            background-color: #0d6efd;
            color: white;
            text-align: center;
            vertical-align: middle;
        }

        .table-custom td {
            vertical-align: middle;
            text-align: center;
        }

        .table-custom tbody tr:hover {
            background-color: #eef2ff;
        }

        /* Button styling */
        .btn-sm {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
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

    <!-- Konten utama -->
    <div class="content">
        <h2 class="text-center mb-4">TO DO LIST</h2>

        <!-- Tabel -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center table-custom">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Prioritas</th>
                        <th>Deadline</th>
                        <th>Dibuat tgl</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($pengguna as $task): ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= htmlspecialchars($task->judul) ?> </td>
                            <td><?= htmlspecialchars($task->deskripsi) ?> </td>
                            <td><?= htmlspecialchars($task->status) ?> </td>
                            <td><?= htmlspecialchars($task->prioritas) ?> </td>
                            <td><?= htmlspecialchars($task->deadline) ?> </td>
                            <td><?= date('Y-m-d', strtotime($task->dibuat_tgl)) ?> </td>
                            <td>
                                <a href="edit.php?id=<?= $task->id ?>" class="btn btn-info btn-sm"> Edit</a>
                                <a onclick="return confirm('Apakah pekerjaan ini telah selesai?')"
                                    href="../controllers/c_user.php?id=<?= $task->id ?>&aksi=selesai"
                                    class="btn btn-success btn-sm">
                                     Selesai
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
