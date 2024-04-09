<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$database = 'growtopia';
$koneksi = mysqli_connect($host, $username, $password, $database);

function tambahItem($nama_item, $image, $harga) {
    global $koneksi;

    $nama_item = mysqli_real_escape_string($koneksi, $nama_item);
    $image = mysqli_real_escape_string($koneksi, $image);
    $harga = mysqli_real_escape_string($koneksi, $harga);

    $query = "INSERT INTO item (nama_item, image, harga) VALUES ('$nama_item', '$image', '$harga')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Item berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan item: " . mysqli_error($koneksi);
    }
}

function hapusItem($id) {
    global $koneksi;

    $query = "DELETE FROM item WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Item berhasil dihapus.";
    } else {
        echo "Gagal menghapus item: " . mysqli_error($koneksi);
    }
}

function editItem($id, $nama_item, $image, $harga) {
    global $koneksi;

    $nama_item = mysqli_real_escape_string($koneksi, $nama_item);
    $image = mysqli_real_escape_string($koneksi, $image);
    $harga = mysqli_real_escape_string($koneksi, $harga);

    $query = "UPDATE item SET nama_item='$nama_item', image='$image', harga='$harga' WHERE id=$id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Item berhasil diupdate.";
    } else {
        echo "Gagal mengupdate item: " . mysqli_error($koneksi);
    }
}

if (isset($_POST['tambah'])) {
    $nama_item = $_POST['nama_item'];
    $image = $_POST['image'];
    $harga = $_POST['harga'];
    tambahItem($nama_item, $image, $harga);
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    hapusItem($id);
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_item = $_POST['nama_item'];
    $image = $_POST['image'];
    $harga = $_POST['harga'];
    editItem($id, $nama_item, $image, $harga);
}

$query = "SELECT * FROM item";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Items</title>
</head>
<body>
    <h2>Tambah Item Baru</h2>
    <form method="POST">
        <label for="nama_item">Nama Item:</label><br>
        <input type="text" id="nama_item" name="nama_item"><br>
        <label for="image">Nama File Gambar:</label><br>
        <input type="file" id="image" name="image"><br>
        <label for="harga">Harga:</label><br>
        <input type="text" id="harga" name="harga"><br><br>
        <button type="submit" name="tambah">Tambah Item</button>
    </form>

    <hr>

    <h2>Hapus Item</h2>
    <form method="POST">
        <label for="id">ID Item yang akan dihapus:</label><br>
        <input type="text" id="id" name="id"><br><br>
        <button type="submit" name="hapus">Hapus Item</button>
    </form>

    <hr>

    <h2>Edit Item</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Item</th>
            <th>Image</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama_item']; ?></td>
                <td><?php echo $row['image']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="nama_item" value="<?php echo $row['nama_item']; ?>">
                        <input type="text" name="image" value="<?php echo $row['image']; ?>">
                        <input type="text" name="harga" value="<?php echo $row['harga']; ?>">
                        <button type="submit" name="edit">Edit</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
