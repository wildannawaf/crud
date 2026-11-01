<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO tugas (matkul, deskripsi, deadline, status) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['matkul'], $_POST['deskripsi'], $_POST['deadline'], $_POST['status']]);
    header('Location: index.php');
    exit;
}

include 'header.php';
?>
<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title">Tambah Tugas</h5>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Mata Kuliah</label>
                <input type="text" name="matkul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Deadline</label>
                <input type="date" name="deadline" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option>Belum</option><option>Proses</option><option>Selesai</option>
                </select>
            </div>
            <button class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>
