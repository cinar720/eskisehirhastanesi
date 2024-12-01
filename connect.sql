// Veritabanı bağlantısı (örnek)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Bağlantıyı oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}
