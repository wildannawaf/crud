<?php
require 'config.php';

$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE tugas SET matkul=?, deskripsi=?, deadline=?, status=? WHERE id=?");
    $stmt->execute([$_POST['matkul'], $_POST['deskripsi'], $_POST['deadline'], $_POST['status'], $id]);
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM tugas WHERE id=?");
$stmt->execute([$id]);
$t = $stmt->fetch();
if (!$t) { header('Location: index.php'); exit; }

include 'header.php';
?>
<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title">Edit Tugas</h5>
        <form method="post">
            <input type="hidden" name="id" value="<?= $t['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Mata Kuliah</label>
                <input type="text" name="matkul" class="form-control" value="<?= htmlspecialchars($t['matkul']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($t['deskripsi']) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Deadline</label>
                <input type="date" name="deadline" class="form-control" value="<?= $t['deadline'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <?php foreach (['Belum', 'Proses', 'Selesai'] as $s): ?>
                        <option <?= $t['status'] === $s ? 'selected' : '' ?>><?= $s ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>
