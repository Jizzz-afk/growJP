<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="ikon.png">

<title>Toko Hitam</title>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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


        .contact {
            position: relative;
            min-height: 100vh;
            padding: 50px 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: url(images.jpeg);
            background-size: cover;
        }

        .contact .content {
            max-width: 800px;
            text-align: center;
            color: #fff;
        }

        .contact .content h2 {
            font-size: 36px;
            font-weight: 500;
        }

        .contact .content p {
            font-weight: 300;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        .container .contactInfo {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        .container .contactInfo .box {
            position: relative;
            padding: 11px 0;
            display: flex;
            align-items: center;
        }

        .container .contactInfo .box .icon {
            min-width: 60px;
            height: 60px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 22px;
        }

        .container .contactInfo .box .text {
            display: flex;
            margin-left: 20px;
            font-size: 16px;
            color: #fff;
            flex-direction: column;
            font-weight: 300;
        }

        .container .contactInfo .box .text h3 {
            font-weight: 500;
            color: #00bcd4;
        }

        .contactForm {
            width: 40%;
            padding: 40px;
            background: #fff;
        }

        .contactForm h3 {
            font-size: 30px;
            color: #333;
            font-weight: 500;
            text-align: center;
        }

        .contactForm .inputBox {
            position: relative;
            width: 100%;
            margin-top: 10px;
        }

        .contactForm .inputBox input, textarea {
            width: 100%;
            padding: 5px 0;
            font-size: 16px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid #333;
            outline: none;
            resize: none;
        }

        .contactForm .inputBox span {
            position: absolute;
            left: 0;
            padding: 1px 0;
            font-size: 14px;
            margin: 10px 0;
            pointer-events: none;
            transition: 0.5s;
            color: #666;
        }

        .contactForm .inputBox input:focus ~ span, 
        .contactForm .inputBox input:valid ~ span {
            color: #e91e63;
            font-size: 12px;
            transform: translateY(-20px);
        }

        .contactForm .inputBox textarea:focus ~ span,
        .contactForm .inputBox textarea:valid ~ span {
            color: #e91e63;
            font-size: 12px;
            transform: translateY(-20px);
        }


        .contactForm .inputBox input[type="submit"] {
            width: 100px;
            background: #00bcd4;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px;
            font-size: 18px;
            margin: 20px auto;
            display: block;
        }

        @media only screen and (max-width: 768px) {
            .contact {
                padding: 30px 20px;
                overflow-y: auto;
                max-height: 80vh;
            }

            .contact::-webkit-scrollbar {
                display: none; 
            }

            .content {
                padding: 40px 10px;
            }

            .container {
                flex-direction: column;
            }

            .container .contactInfo,
            .container .contactForm {
                width: 100%;
                margin-top: 20px;
            }

            .contactForm {
                padding: 20px;
            }
        }

        @media only screen and (max-width: 991px) {
            .contact .content h2 {
                font-size: 28px;
            }

            .contact .content p {
                font-size: 14px;
            }

            .container .contactInfo .box .icon {
                min-width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .container .contactInfo .box .text {
                margin-left: 10px;
                font-size: 14px;
            }

            .contactForm h2 {
                font-size: 24px;
            }

            .contactForm .inputBox input,
            .contactForm .inputBox textarea {
                font-size: 14px;
            }

            .contactForm .inputBox input[type="submit"] {
                font-size: 16px;
            }
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
<form action="proses_contact.php" method="post">

    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>Kehitamanmu Di Hargai Disini</p>
        </div>
        <div class="container">
        <div class="contactInfo">
            <div class="box">
                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="text">
                    <h3>Address</h3>
                    <p>Cirebon, Jawabarat</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="far fa-envelope"></i></div>
                <div class="text">
                    <h3>Email</h3>
                    <p>paljiz@gmail.com</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fab fa-whatsapp"></i></div>
                <div class="text">
                    <h3>Whatsapp</h3>
                    <p>0859-2528-7373</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fab fa-discord"></i></div>
                <div class="text">
                    <h3>Discord</h3>
                    <p>https://discord.gg/pdFJzkF</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fab fa-facebook"></i></div>
                <div class="text">
                    <h3>Facebook</h3>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="contactForm">
            <form >
                <h3>Support</h3>
                <div class="inputBox">
                    <input type="text" name="full_name" id="full_name" required="required">
                    <span>Full Name</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" id="email" required="required">
                    <span>Email</span>
                </div>
                <div class="inputBox">
                <input type="text" name="message" id="message" required="required">
                    <span>Type Your Message...</span>
                </div>
                <div class="inputBox">
                    <input type="submit" name="" value="Send">
                </div>
            </form>
        </div>
    </div>
</section>
</form>

</body>
</html>
