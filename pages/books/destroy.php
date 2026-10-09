
<?php
require '../../repositories/book-repository.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    echo "Aksi hapus buku dengan ID " . $id . " berhasil dipanggil.";
} else {
    echo "ID buku tidak ditemukan.";
}
