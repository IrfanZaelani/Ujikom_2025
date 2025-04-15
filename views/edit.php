<?php
include_once '../models/m_user.php';
$user = new user ();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Ambil ID dari parameter URL
$data = $user->tampil_data_byid($id);
$data = $data ? $data[0] : null; // 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Edit Data</title>
</head>
<body>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h4>Edit Data</h4>
            <form action="../controllers/c_user.php?aksi=update" method="post">
                <input type="hidden" name="id_user" value="<?= htmlspecialchars($data->id) ?>">
                <div class="mb-3">
                    <label for="username" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= htmlspecialchars($data->judul) ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">deskripsi</label>
                    <input type="textarea" class="form-control" id="deskripsi" name="deskripsi" value="<?= htmlspecialchars($data->deskripsi) ?>">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?= htmlspecialchars($data->status) ?>">
                </div>
                <div class="mb-3">
                    <label for="prioritas" class="form-label">Prioritas</label>
                    <select class="form-control" id="prioritas" name="prioritas">
                        <option value="penting" <?= $data->prioritas == 'penting' ? 'selected' : '' ?>>Penting</option>
                        <option value="tidak penting" <?= $data->prioritas == 'tidak penting' ? 'selected' : '' ?>>Tidak Penting</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" value="<?= htmlspecialchars($data->deadline) ?>">
                </div>
                
                <div class="mb-3">
                    <label for="dibuat tanggal" class="form-label">dibuat Tanggal</label>
                    <input type="date" class="form-control" id="dibuat_tgl" name="dibuat_tgl" value="<?= htmlspecialchars($data->dibuat_tgl) ?>">
                </div>
               
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>