<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="ikon.png">

<title>Toko Hitam</title>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            text-transform: capitalize;
            text-decoration: none;
        }
        body {
            min-height: 100vh;
            background: url('walp.webp') no-repeat;
            background-size: cover;
            background-position: center;
           background-attachment: fixed;
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
    max-width: 1000px;
    margin: 80px auto;
    display: grid;
    grid-template-columns: repeat(5, 1fr); 
    gap: 20px; 
    justify-content: center;
    overflow-y: auto;
    max-height: 70vh;
}

.container::-webkit-scrollbar {
    display: none; 
}

@media (max-width: 990px) {
    .container {
        margin: 40px auto; 
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); 
        padding: 0 20px;
    }
}

.product {
    display: flex;
    flex-direction: column; 
    border: 1px solid #ccc;
    padding: 20px 20px;
    text-align: center;
    box-sizing: border-box;
}

.product img {
    max-width: 100%;
    height: auto;
}

.product-info {
    margin-top: 10px;
    flex-grow: 1; 
}

.buy-button-container {
    display: flex; 
    justify-content: center;
}

.buy-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
    position: relative; /* Tambahkan posisi relatif */
}

.buy-button::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;   
    height: 2px;
    background-color: white;  
    transition: width 0.3s ease; 
}

.buy-button:hover::before {
    width: 100%; 
}


    </style>
</head>
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
<div class="container">
    <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM item";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<img src='/projek/image/" . $row["image"] . "' alt='" . $row["nama_item"] . "'>";
            echo "<div class='product-info'>";
            echo "<h2 class='product-title'>" . $row["nama_item"] . "</h2>";
            echo "<p class='product-price'>Rp " . $row["harga"] . "</p>";
            echo "<p class='product-description'></p>";
            echo "</div>"; 
            echo "<div class='buy-button-container'>";
            echo "<button class='buy-button' data-id='" . $row["id"] . "' onclick='addToCart(" . $row["id"] . ")'><a href='add-to-cart.php?id=" . $row["id"] . "'>Buy</a></button>";
            echo "</div>"; 
            echo "</div>"; 

        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
