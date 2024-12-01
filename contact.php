<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Burada veritabanına kaydetme veya e-posta gönderme işlemleri yapılabilir.
    // Örneğin, form verilerini e-posta ile gönderebilirsiniz:

    $to = "info@hospital.com"; // E-posta adresini buraya yazın
    $subject = "Yeni İletişim Formu";
    $body = "Ad: $name\nEmail: $email\nMesaj: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $success_message = "Mesajınız başarıyla gönderildi!";
    } else {
        $error_message = "Bir hata oluştu, lütfen tekrar deneyin.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
</head>
<body>
    <h2>İletişim</h2>
    <?php 
    if (isset($success_message)) { echo "<p style='color:green;'>$success_message</p>"; }
    if (isset($error_message)) { echo "<p style='color:red;'>$error_message</p>"; }
    ?>
    <form method="POST">
        <label for="name">Adınız:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="message">Mesajınız:</label>
        <textarea name="message" id="message" required></textarea>
        <br>
        <button type="submit">Gönder</button>
    </form>
</body>
</html>
