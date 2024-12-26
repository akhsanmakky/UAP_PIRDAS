<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // Validasi aksi
    if ($action === 'open') {
        echo "Servo dibuka.";
        // Tambahkan logika untuk membuka servo
    } elseif ($action === 'close') {
        echo "Servo ditutup.";
        // Tambahkan logika untuk menutup servo
    } else {
        echo "Aksi tidak valid.";
    }
} else {
    echo "Akses tidak diizinkan.";
}
?>
