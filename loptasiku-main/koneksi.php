<?php
// Koneksi ke database PostgreSQL
$host = '127.0.0.1';
$port = '5432';
$dbname = 'ticketing_db';
$user = 'postgres';
$password = 'pkb1025';

$pdo = null; // Inisialisasi variabel

try {
    // Membuat koneksi ke database
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Jangan die() agar website tetap muncul (fallback mode)
    // Log error di console browser (untuk debugging developer)
    echo "<script>console.error('Database connection failed: " . addslashes($e->getMessage()) . "');</script>";
    $pdo = null;
}
?>