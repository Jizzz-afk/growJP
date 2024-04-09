<?php
include 'koneksi.php';
session_start();

$total_harga = isset($_SESSION['total_harga']) ? $_SESSION['total_harga'] : 0;

$daftar_barang_dibeli = isset($_SESSION['cart_info']) ? $_SESSION['cart_info'] : [];

$sql = "SELECT * FROM pembayaran";
$result = $conn->query($sql);

$metode_pembayaran = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $metode_pembayaran[] = $row['metode_pembayaran'];
    }
} else {
    echo "Tidak ada metode pembayaran yang tersedia.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="ikon.png">
    <title>Toko Hitam</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; 
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Transaksi</h2>
        <form action="proses_checkout.php" method="POST">
        <label for="metode_pembayaran">Pilih Metode Pembayaran:</label>
            <select name="metode_pembayaran" id="metode_pembayaran" required>
                <option value="">Pilih Metode Pembayaran</option>
                <option value="SHOPEE">SHOPEE</option>
                <option value="OVO">OVO</option>
                <option value="GOPAY">GOPAY</option>
                <option value="DANA">DANA</option>
                <option value="BCA">BCA</option>
            </select>

            <label for="grow_id">Masukkan Grow ID:</label>
            <input type="text" name="grow_id" id="grow_id" required>
            <label for="nama_world">Masukkan Nama World:</label>
            <input type="text" name="nama_world" id="nama_world" required>
            <label for="nomor_telepon">Masukkan Nomor Telepon:</label>
            <input type="tel" name="nomor_telepon" id="nomor_telepon" required>
            <label for="jumlah_pembayaran">Jumlah Pembayaran:</label>
            <input type="text" name="jumlah_pembayaran" id="jumlah_pembayaran" value="<?php echo $total_harga; ?>" readonly>
            <label for="daftar_barang">Daftar Barang yang Dibeli:</label>
            <ul>
                <?php foreach ($_SESSION['cart_info'] as $barang) { ?>
                    <li><?php echo $barang; ?></li>
                <?php } ?>
            </ul>
            
            <input type="submit" value="Lanjutkan Pembayaran">
        </form>
    </div>
</body>
</html>
