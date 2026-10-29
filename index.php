<?php
require 'config.php';
include 'header.php';

$data = $pdo->query("SELECT * FROM tugas ORDER BY deadline ASC")->fetchAll();
$warna = ['Belum' => 'danger', 'Proses' => 'warning', 'Selesai' => 'success'];
?>
<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title">Daftar Tugas</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr><th>#</th><th>Mata Kuliah</th><th>Deskripsi</th><th>Deadline</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                <?php if (!$data): ?>
                    <tr><td colspan="6" class="text-center text-muted">Belum ada tugas.</td></tr>
                <?php endif; ?>
                <?php foreach ($data as $i => $t): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($t['matkul']) ?></td>
                        <td><?= htmlspecialchars($t['deskripsi']) ?></td>
                        <td><?= date('d-m-Y', strtotime($t['deadline'])) ?></td>
                        <td><span class="badge bg-<?= $warna[$t['status']] ?>"><?= $t['status'] ?></span></td>
                        <td>
                            <a href="edit.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="hapus.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-danger"
                               onclick="return confirm('Hapus tugas ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
