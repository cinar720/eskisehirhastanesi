<?php
session_start();

// Oturumu sonlandır
session_unset();  // Tüm oturum verilerini temizler
session_destroy();  // Oturumu sonlandırır

// Kullanıcıyı login sayfasına yönlendir
header("Location: login.html");
exit();
?>
