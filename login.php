<?php
session_start();

// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hastane"; // Aynı veritabanı adı

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

// Form verilerinin gelip gelmediğini kontrol et
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL sorgusu (email'e göre kullanıcıyı sorgula)
    $stmt = $conn->prepare("SELECT id, password FROM kullanici WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Şifre doğruysa, giriş başarılı
            $_SESSION['user_id'] = $row['id'];
            header("Location: dashboard.html");
            exit();
        } else {
            echo "Geçersiz şifre!";
        }
    } else {
        echo "Kullanıcı bulunamadı!";
    }

    $stmt->close();
} else {
    // Eğer email veya password gelmediyse
    echo "Form verileri eksik!";
}

$conn->close();
?>
