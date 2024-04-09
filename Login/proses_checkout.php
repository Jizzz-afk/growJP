<?php
include 'koneksi.php';
session_start();

$metode_pembayaran = $_POST['metode_pembayaran'];
$grow_id = $_POST['grow_id'];
$nama_world = $_POST['nama_world'];
$nomor_telepon = $_POST['nomor_telepon'];
$jumlah_pembayaran = $_POST['jumlah_pembayaran'];
$daftar_barang_dibeli = isset($_SESSION['cart_info']) ? $_SESSION['cart_info'] : [];

$id_transaksi = generateTransactionID();

$sql_pelanggan = "INSERT INTO pelanggan (nama_world, grow_id, nomor_telepon) 
                  VALUES ('$nama_world', '$grow_id', '$nomor_telepon')";
if ($conn->query($sql_pelanggan) === TRUE) {
    $last_pelanggan_id = $conn->insert_id; 
} else {
    echo "Error: " . $sql_pelanggan . "<br>" . $conn->error;
}

$sql_pembayaran = "INSERT INTO pembayaran (id_transaksi, metode_pembayaran, jumlah_pembayaran) 
                   VALUES ('$id_transaksi', '$metode_pembayaran', '$jumlah_pembayaran')";
if ($conn->query($sql_pembayaran) === TRUE) {
    $last_pembayaran_id = $conn->insert_id;
} else {
    echo "Error: " . $sql_pembayaran . "<br>" . $conn->error;
}


foreach ($daftar_barang_dibeli as $barang) {
    $sql_detail_pembayaran = "INSERT INTO detail_pembayaran (id_pembayaran, nama_barang) VALUES ('$last_pembayaran_id', '$barang')";
    if ($conn->query($sql_detail_pembayaran) !== TRUE) {
        echo "Error: " . $sql_detail_pembayaran . "<br>" . $conn->error;
        header("Location: checkout.php");
        exit();
    }
}


unset($_SESSION['cart_info']);
unset($_SESSION['total_harga']);


$_SESSION['transaksi'] = [
    'id_transaksi' => $id_transaksi,
    'metode_pembayaran' => $metode_pembayaran,
    'jumlah_pembayaran' => $jumlah_pembayaran,
    'nama_world' => $nama_world,
    'grow_id' => $grow_id,
    'nomor_telepon' => $nomor_telepon,
    'daftar_barang_dibeli' => $daftar_barang_dibeli
];

header("Location: struk_pembayaran.php");
exit();

$conn->close();

function generateTransactionID() {
    return uniqid();
}
?>
