<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esp32_db"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data terbaru
$result = $conn->query("SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1");
$data = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP32 Monitoring System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f3f4f6;
            color: #333;
        }
        header {
            background: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .data-section {
            text-align: center;
            margin-bottom: 20px;
        }
        .data-section p {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .data-section strong {
            font-size: 1.5em;
            color: #4CAF50;
        }
        .button-section {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>ESP32 Monitoring System</h1>
    </header>
    <div class="container">
        <div class="data-section">
            <h2>Sensor Data</h2>
            <p><strong>Suhu:</strong> <span><?php echo $data['temperature']; ?></span> °C</p>
            <p><strong>Food Level:</strong> <span><?php echo $data['food_level']; ?></span> %</p>
        </div>
        <div class="button-section">
            <form method="post" action="control_servo.php">
                <button name="action" value="open">Buka Servo</button>
                <button name="action" value="close">Tutup Servo</button>
            </form>
        </div>
    </div>
</body>
</html>
