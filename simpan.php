<?php
$host = "localhost";
$user = "root"; // username MySQL
$pass = "";     // password MySQL
$db   = "data_pengguna"; // database kamu

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$nama   = $_POST['nama'];
$email  = $_POST['email'];
$tgl    = $_POST['tgl'];
$gender = $_POST['gender'];
$bio    = $_POST['bio'];

$sql = "INSERT INTO users (nama, email, tgl_lahir, gender, bio) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nama, $email, $tgl, $gender, $bio);

if ($stmt->execute()) {
  echo "Data berhasil disimpan!";
} else {
  echo "Gagal menyimpan data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
