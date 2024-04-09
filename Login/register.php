<?php
require 'koneksi.php';
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "INSERT INTO login (username, email, password)
        VALUES ('$username', '$email', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: login.php");
} else {
    echo "Pendaftaran Gagal : ". mysqli_error($conn);
}
?>