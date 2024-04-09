<?php
include 'koneksi.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (full_name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $full_name, $email, $message);

    if ($stmt->execute()) {
        echo "Pesan Anda Berhasil Dikirim!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
