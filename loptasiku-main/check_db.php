<?php
// Aktifkan semua error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Diagnosa Database</h1>";

// 1. Cek Extension PHP
echo "<h2>1. Cek Driver PostgreSQL</h2>";
if (extension_loaded('pdo_pgsql')) {
    echo "<p style='color:green'>✅ Extension pdo_pgsql terinstall.</p>";
} else {
    echo "<p style='color:red'>❌ Extension pdo_pgsql TIDAK ditemukan. Anda harus mengaktifkannya di php.ini.</p>";
    echo "<p>Caranya:</p>";
    echo "<ul>";
    echo "<li>Buka XAMPP Control Panel > Config > PHP (php.ini)</li>";
    echo "<li>Cari baris <code>;extension=pdo_pgsql</code></li>";
    echo "<li>Hapus titik koma (;) di depannya menjadi <code>extension=pdo_pgsql</code></li>";
    echo "<li>Cari juga <code>;extension=pgsql</code> dan aktifkan jika ada.</li>";
    echo "<li>Simpan file dan Restart Apache di XAMPP.</li>";
    echo "</ul>";
}

// 2. Cek Koneksi
echo "<h2>2. Cek Koneksi</h2>";
$host = '127.0.0.1';
$port = '5432';
$dbname = 'ticketing_db';
$user = 'postgres';
$password = 'pkb1025'; // Pastikan ini sesuai password asli Anda

echo "<p>Mencoba koneksi dengan user: <strong>$user</strong> dan password: <strong>$password</strong></p>";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green'>✅ Koneksi Berhasil!</p>";
} catch (PDOException $e) {
    echo "<p style='color:red'>❌ Koneksi Gagal: " . $e->getMessage() . "</p>";

    if (strpos($e->getMessage(), 'could not find driver') !== false) {
        echo "<p><strong>Saran:</strong> Error ini mengonfirmasi driver belum aktif. Ikuti langkah di poin 1.</p>";
    }
    if (strpos($e->getMessage(), 'password authentication failed') !== false) {
        echo "<p><strong>Saran:</strong> Password salah. Silakan edit file <code>koneksi.php</code> dan masukkan password yang benar.</p>";
    }
    if (strpos($e->getMessage(), 'database "ticketing_db" does not exist') !== false) {
        echo "<p><strong>Saran:</strong> Database belum dibuat. Silakan buat database bernama <code>ticketing_db</code> di pgAdmin atau terminal.</p>";
    }
}
?>