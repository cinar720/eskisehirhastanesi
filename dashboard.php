<?php
session_start();

// Eğer giriş yapılmadıysa, login.php'ye yönlendir
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Paneli</title>
</head>
<body>
    <h2>Yönetici Paneli</h2>
    <p>Hoşgeldiniz, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <p><a href="logout.php">Çıkış Yap</a></p>

    <!-- Burada yöneticiye özel içerikler ekleyebilirsiniz -->
    <h3>İstatistikler</h3>
    <p>Burada hastane ile ilgili istatistikler yer alabilir.</p>

    <h3>Doktorlar</h3>
    <p>Doktorlarınızın bilgilerini burada görüntüleyebilirsiniz.</p>

    <h3>Hastalar</h3>
    <p>Burada hastalarla ilgili işlemleri yapabilirsiniz.</p>
</body>
</html>
