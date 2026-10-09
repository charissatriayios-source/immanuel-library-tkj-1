<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Penulis - Perpustakaan Digital</title>
  <link rel="stylesheet" href="../../styles/authors/index.css">
</head>
<body>
  
<?php
require '../../repositories/author-repository.php';

$authors = getAuthors();

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    echo "Aksi hapus penulis dengan ID " . $id . " berhasil dipanggil.";
}
?>

  <div class="app-shell">
  <?php include '../../components/admin/sidebar.php'; ?>

    <main class="app-main">
    <?php
$pageTitle = 'Manajemen Penulis';
$pageSubtitle = 'Kelola data penulis buku';
include '../../components/admin/topbar.php';
?>

      <div class="app-content">
        <div class="toolbar">
          <form method="" action="" class="toolbar-filters">
            <div class="search-box">
              <svg class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
              <input type="text" name="search" class="search-input" placeholder="Cari nama penulis...">
            </div>
            <button type="submit" class="btn btn-outline btn-sm">Cari</button>
          </form>
          <a href="create.php" class="btn btn-primary">+ Tambah Penulis</a>
        </div>

        <div class="data-card">
          <table class="data-table">
            <thead>
              <tr>
                <th>Nama Penulis</th>
                <th>Jumlah Buku Ditulis</th>
                <th>Aksi</th>
              </tr>
            </thead>
            
<tbody>
  <?php foreach ($authors as $author): ?>
    <tr>
      <td>
        <div class="cell-primary">
          <span class="cell-thumb">✎</span>
          <?= htmlspecialchars($author['name']) ?>
        </div>
      </td>
      <td>
        <span class="badge badge-muted">
          <?= $author['total_books'] ?> buku
        </span>
      </td>
      <td>
        <div class="cell-actions">
          <a href="edit.php?id=<?= $author['id'] ?>"
             class="btn btn-outline btn-sm">Edit</a>
          <a href="index.php?delete=<?= $author['id'] ?>"
             class="btn btn-danger btn-sm"
             onclick="return confirm('Yakin ingin menghapus penulis ini?')">
             Hapus
          </a>
        </div>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>

          </table>
        </div>

        <div class="pagination">
          <span class="pagination-btn is-disabled">&lt;</span>
          <span class="pagination-btn is-disabled">&gt;</span>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
