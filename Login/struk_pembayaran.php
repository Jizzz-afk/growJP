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
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .receipt {
            margin-top: 20px;
        }

        .receipt p {
            margin: 10px 0;
        }

        .receipt strong {
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-style: italic;
            color: #666;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>STRUK PEMBAYARAN</h2>
        <div class="receipt">
            <?php
            session_start();

            if(isset($_SESSION['transaksi'])) {
                $transaksi = $_SESSION['transaksi'];

                echo "<div class='wrapper'>";
                echo "<p><strong>Metode Pembayaran:</strong> " . ($transaksi['metode_pembayaran'] ?? '') . "</p>";
                echo "<p><strong>Jumlah Pembayaran:</strong> Rp " . ($transaksi['jumlah_pembayaran'] ?? '') . "</p>";
                echo "<p><strong>Nama World:</strong> " . ($transaksi['nama_world'] ?? '') . "</p>";
                echo "<p><strong>Grow ID:</strong> " . ($transaksi['grow_id'] ?? '') . "</p>";
                echo "<p><strong>Nomor Telepon:</strong> " . ($transaksi['nomor_telepon'] ?? '') . "</p>";
                echo "<p><strong>ID Transaksi:</strong> " . ($transaksi['id_transaksi'] ?? '') . "</p>";
                echo "<p><strong>Daftar Barang yang Dibeli:</strong><br>";
                if (!empty($transaksi['daftar_barang_dibeli'])) {
                    foreach ($transaksi['daftar_barang_dibeli'] as $barang) {
                        echo "- $barang<br>";
                    }
                }
                echo "</p>";
            } else {
                echo "Data transaksi tidak ditemukan.";
            }
            ?>
        </div>
        <div class="footer">
            <p>Terima kasih atas pembelian Anda di TOKO HITAM!</p>
            <a href="#"id="cetakButton" class="button">Cetak Struk</a>
        </div>
    </div>
</body>
</html>
<script>
var cetakButton = document.getElementById('cetakButton');
cetakButton.addEventListener('click', function() {
    cetakStruk();
});
function cetakStruk() {
    window.print();
}
</script>