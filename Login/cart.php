<?php
include 'koneksi.php';
session_start();

if (isset($_POST['hapus_item'])) {
    if (isset($_POST['hapus_item_id'])) {
        $hapus_id = $_POST['hapus_item_id'];

        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$hapus_id])) {
            unset($_SESSION['cart'][$hapus_id]);
            unset($_SESSION['cart_info'][$hapus_id]); 
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'tambah_item') {
    
    if (isset($_GET['tambah_item_id'])) {
        $tambah_id = $_GET['tambah_item_id'];
        
        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$tambah_id])) {
            $_SESSION['cart'][$tambah_id]++;
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'kurangi_item') {
    if (isset($_GET['kurangi_item_id'])) {
        $kurangi_id = $_GET['kurangi_item_id'];
        
        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$kurangi_id])) {
            if ($_SESSION['cart'][$kurangi_id] > 1) {
                $_SESSION['cart'][$kurangi_id]--;
            } else {
                unset($_SESSION['cart'][$kurangi_id]);
                unset($_SESSION['cart_info'][$kurangi_id]);
            }
        }
    }
}

$total_harga = 0;

if (!empty($_SESSION['cart'])) {
    $ids = implode(",", array_keys($_SESSION['cart']));
    $sql = "SELECT * FROM item WHERE id IN ($ids)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<form action='cart.php' method='POST'>";
        $_SESSION['cart_info'] = array(); 
        while($row = $result->fetch_assoc()) {
            $harga = $row["harga"] * 1000;
            $subtotal = $harga * $_SESSION['cart'][$row["id"]];
            $total_harga += $subtotal;
            
            $_SESSION['cart_info'][$row["id"]] = $row["nama_item"];
            
            echo "<div class='product'>";
            echo "<img src='/projek/image/" . $row["image"] . "' alt='" . $row["nama_item"] . "'>";
            echo "<div class='product-info'>";
            echo "<h3 class='product-title'>" . $row["nama_item"] . "</h3>";
            echo "<p class='product-price'>Rp " . $harga . "</p>";
            echo "<div class='button-group'>";
            echo "<a href='cart.php?tambah_item_id=" . $row["id"] . "&action=tambah_item' class='add-button'>+</a>";
            echo "<span class='item-quantity'>" . $_SESSION['cart'][$row["id"]] . "</span>";
            echo "<a href='cart.php?kurangi_item_id=" . $row["id"] . "&action=kurangi_item' class='remove-button'>-</a>";
            echo "</div>";
            echo "<p class='subtotal'>Subtotal: Rp " . $subtotal . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</form>";

        echo "<div class='total'>";
        echo "<p>Total Harga: Rp " . $total_harga . "</p>";
        echo "</div>";

        $_SESSION['total_harga'] = $total_harga;

        echo "<a href='checkout.php' class='checkout-button'>Checkout</a>";
    } else {
        echo "<p class='empty'>Keranjang belanja kosong.</p>";
    }
} else {
    echo "<p class='empty'>Keranjang belanja kosong.</p>";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="ikon.png">

<title>Toko Hitam</title>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>

        *   {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            text-transform: capitalize;
            text-decoration: none;
            overflow-y: auto; 
            max-height: 1500vh;
        }

        html {
        overflow-y: scroll; 
        scrollbar-width: none; 
        }

        body {
            min-height: 100vh;
            background: url('artp.jpg') no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #64CCC5;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            padding: 0px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
            opacity: 0.8;
            width: 100%;
        }

        header .logo {
            font-weight: bolder;
            font-size: 25px;
            color: #04364A;
        }

        header .navbar ul {
            list-style: none;
            display: flex;
        }

        header .navbar ul li {
            position: relative;
            margin-right: 20px;
        }

        header .navbar ul li a {
            font-size: 18px;
            padding: 13px;
            color: #04364A;
            display: block;
            position: relative;
            overflow: hidden;
        }

        header .navbar ul li a::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: white; 
            transition: width 0.3s ease;
        }

        header .navbar ul li a:hover::before {
            width: 100%;
        }

        header .navbar ul li ul {
            position: absolute;
            left: 0;
            width: 192px;
            background: #64CCC5;
            display: none;
            overflow-y: auto; 
            max-height: 150px; 
        }

        header .navbar ul li ul li {
            width: 100%;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        header .navbar ul li ul li ul {
            left: 100%;
            top: 0;
        }

        header .navbar ul li:hover > ul {
            display: block; 
        }

        #menu {
            display: none;
        }

        header label {
            font-size: 18px;
            color: #04364A;
            cursor: pointer;
            display: none;
        }

        @media(max-width: 991px) {
            header {
                padding: 20px;
            }

            header label {
                display: initial;
            }

            header .navbar {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #64CCC5;
                border-top: 1px solid rgba(0, 0, 0, .1);
                display: none;
                width: 100%;
            }

            header .navbar ul {
                flex-direction: column;
            }

            header .navbar ul li {
                width: 100%;
            }

            header .navbar ul li ul {
                position: relative;
                width: auto;
            }

            header .navbar ul li ul li {
                background: #64CCC5;
            }

            header .navbar ul li ul li ul {
                width: auto;
                left: 100%;
            }

            #menu:checked ~ .navbar {
                display: initial; 
            }

            header .navbar ul li a:hover::before {
                width: 100%; 
            }
        }

        header .navbar ul li ul::-webkit-scrollbar {
            display: none;
        }


.container {
    max-width: 800px;
    margin: 20px auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr); 
    gap: 20px; 
}

.empty {
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center; 
    height: 500px;
}

.product {
    margin-top: 50px;
}

.product img {
    max-width: 100%; 
    height: auto;
}

.button-group {
    display: flex;
    align-items: center;
}

.add-button {
    background-color: #007bff; /* Warna biru */
    color: #fff;
    border: none;
    padding: 5px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
}

.add-button:hover {
    background-color: #0056b3; 
}

.remove-button {
    background-color: #ff5555;
    color: #fff;
    border: none;
    padding: 5px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
}

.remove-button:hover {
    background-color: #cc0000;
}

.item-quantity {
    font-size: 16px;
    margin: 0 5px;
}

.total {
    margin-top: 10px;
    border-top: 1px solid #ccc;
    padding-top: 10px;
}

.total p {
    font-weight: bold;
    margin-left: 85%;
}

.checkout-button {
    position: relative;
    background-color: #33cc33;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
    display: block;
    margin-top: 20px;
    margin-left: 85%;
    margin-bottom: 1rem;
    text-align: center;
    transition: background-color 0.3s; 
}

.checkout-button::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #fff;
    transition: width 0.3s ease; 
}

.checkout-button:hover::before {
    width: 100%; 
}


.checkout-button:active {
    background-color: #004d00; 
}

@media(max-width: 990px) {
    .checkout-button {
     margin-left: 75%;
     margin-top: 10px;
     margin-bottom: 1rem;
    }

    .product {
    margin-top: 75px;
}
}

</style> 

    <body>
    <header>
    <input type="checkbox" id="menu">
    <label for="menu">MENU</label>
    <a href="#" class="logo">Toko Hitam</a>
    <nav class="navbar">
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="index.php">ITEM</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="cart.php">CART</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>
</header>
    </body>
    </html>
