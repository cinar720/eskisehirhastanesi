<?php
$servername = "localhost";
$username = "root"; // XAMPP'in varsayılan MySQL kullanıcı adı "root"
$password = ""; // XAMPP'de varsayılan şifre boş
$dbname = "hastane"; // Veritabanınızın adı, doğru olduğundan emin olun

// Bağlantıyı kurma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}
echo "Bağlantı başarılı!";
?>
