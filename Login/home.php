<!DOCTYPE html>
<html lang="en">
   
<head>
<link rel="icon" href="ikon.png">

<title>Toko Hitam</title>
</head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background: url('beck.png') no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
    
        .blur {
            position: absolute;
            top: 0;
            left: 0;
            width: 700px;
            height: 350px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.2); 
            border-radius: 5px;
            z-index: -1;
            box-shadow: 0 0 20px 10px rgba(255, 255, 255, 0.2) inset; 
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

        main {
            background-color: none;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        i {
            position: relative;
            display: block;
            width: 700px;
            height: 350px;
            overflow: hidden;
            border-radius: 5px;
            border: 8px solid rgba(255, 255, 255, 0.2); 
            box-sizing: border-box;
            box-shadow: 0 0 0 10px rgba(255, 255, 255, 0.2), 0 10px 20px -15px rgba(0, 0, 0, 0.2); 
        }
        

        i:before, i:after {
            content: '⤝';
            position: absolute;
            bottom: 1rem;
            left: 6rem;
            z-index: 2;
            width: 2rem;
            height: 2rem;
            background: none;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
        }

        i:after {
            content: '⤞';
            left: 136px;
            right: 432px;
        }

        input {
            appearance: none;
            -ms-appearance: none;
            -webkit-appearance: none;
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 5px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            transform: translateX(100%);
            transition: transform ease-in-out 400ms;
            z-index: 1;
        }

        input:focus {
            outline: none;
        }

        input:after {
            content: attr(title);
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            background-color: rgba(0,0,0,0.4);
            width: 150px;
            color: white;
            padding: .5rem;
            font-size: 1rem;
            border-radius: 5px;
        }

        input:not(checked):before {
            content: '';
            position: absolute;
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            bottom: 1rem;
            left: calc(-100% + 98px);
        }

        input:checked:before {
            display: none;
            left: 1rem;
        }

        input:checked {
            transform: translateX(0);
            pointer-event: none;
            z-index: 0;
            box-shadow: -5px 10px 20px -15px rgba(0,0,0,1);
        }

        input:checked + input:before {
            left: calc(-100% + 138px);
        }

        input:checked + input ~ input:before {
            display: none;
        }

        /* Buy Button Style */
    .buy-button {
    position: absolute;
    top: 280px;
    right: calc(-100% + 7rem);
    padding: 10px 20px;
    background-color: rgba(0, 0, 0, 0.4);
    border: none;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    overflow: hidden; 
    transition: color 0.3s, background-color 0.3s; 
    color: white; 
    text-transform: uppercase; 
    position: relative; 
}

.buy-button::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: white;
    transition: width 0.3s ease; /* Tambahkan transisi untuk efek animasi */
}

.buy-button:hover::before {
    width: 70%; 
}

.buy-button:hover {
    background-color: none; 
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

<main>
    <i>
        <div class="blur"></div>
        <form id="monthForm"> 
            <input checked type="radio" name="s" style="background-image: url('../image/januari.jpg');" title="Januari" value="../fandom/fandom.php">
            <input type="radio" name="s" style="background-image: url('../image/februari.jpg');" title="Februari" value="../fandom/fandom2.php">
            <input type="radio" name="s" style="background-image: url('../image/maret.jpg');" title="Maret" value="../fandom/fandom3.php">
            <input type="radio" name="s" style="background-image: url('../image/april.jpg');" title="April" value="../fandom/fandom4.php">
            <input type="radio" name="s" style="background-image: url('../image/mei.jpg');" title="Mei" value="../fandom/fandom5.php">
            <input type="radio" name="s" style="background-image: url('../image/juni.jpg');" title="Juni" value="../fandom/fandom6.php">
            <input type="radio" name="s" style="background-image: url('../image/juli.jpg');" title="Juli" value="../fandom/fandom7.php">
            <input type="radio" name="s" style="background-image: url('../image/agustus.jpg');" title="Agustus" value="../fandom/fandom8.php">
            <input type="radio" name="s" style="background-image: url('../image/september.jpg');" title="September" value="../fandom/fandom9.php">
            <input type="radio" name="s" style="background-image: url('../image/oktober.jpg');" title="Oktober" value="../fandom/fandom10.php">
            <input type="radio" name="s" style="background-image: url('../image/november.jpg');" title="November" value="../fandom/fandom11.php">
            <input type="radio" name="s" style="background-image: url('../image/desember.jpg');" title="Desember" value="../fandom/fandom12.php">
            <button type="button" class="buy-button" id="infoButton">INFO</button> 
        </form>
    </i>
</main>

<script>
    document.getElementById("infoButton").addEventListener("click", function() {
        // Mendapatkan nilai bulan yang dipilih
        var selectedMonth = document.querySelector('input[name="s"]:checked').value;
        
        // Mengarahkan pengguna ke halaman yang sesuai dengan bulan yang dipilih
        window.location.href = selectedMonth;
    });
</script>

</body>
</html>