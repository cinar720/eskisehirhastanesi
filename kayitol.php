<?php
session_start();

// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hastane"; // Veritabanı adı

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

// Form verilerini al
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

// Şifre kontrolü
if ($password !== $confirmpassword) {
    echo "Şifreler eşleşmiyor!";
    exit();
}

// Şifreyi hash'leme
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL sorgusu (güvenli şekilde)
$stmt = $conn->prepare("INSERT INTO kullanici (fullname, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $fullname, $email, $hashed_password);

// Veritabanına ekleme işlemi
if ($stmt->execute()) {
    // Başarılı kayıt sonrası login.html'e yönlendirme
    header("Location: login.html");
    exit();  // header() sonrasında exit() kullanmayı unutmayın
} else {
    echo "Hata: " . $stmt->error;
}

// Bağlantıyı kapatma
$stmt->close();
$conn->close();
?>
