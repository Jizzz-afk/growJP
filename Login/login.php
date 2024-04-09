<?php
session_start(); 
require 'koneksi.php';
function setRememberMeCookie($email, $password) {
    setcookie("remember_email", $email, time() + (86400 * 30), "/");
    setcookie("remember_password", $password, time() + (86400 * 30), "/");
}

function clearRememberMeCookie() {
    setcookie("remember_email", "", time() - 3600, "/");
    setcookie("remember_password", "", time() - 3600, "/");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_username = $_POST["email_or_username"];
    $password = $_POST["password"];

    if(isset($_POST['remember'])) {
        setRememberMeCookie($email_or_username, $password);
    } else {
        clearRememberMeCookie();
    }

    $query_sql = "SELECT * FROM login
                WHERE (email='$email_or_username' OR username='$email_or_username') AND password ='$password'";

    $result = mysqli_query($conn,$query_sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            header("Location: home.php");
            exit(); 
        } else {
            $_SESSION['error_message'] = 'Email, Username, or Password Incorrect.';
        }
    } else {
        $_SESSION['error_message'] = 'Database Error. Please try again later.';
    }
}


$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['error_message']); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="ikon.png">

<title>Toko Hitam</title>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: url(images.jpeg) no-repeat;
        background-size: cover;
        background-position: center;
    }

    .wrapper {
        width: 420px;
        background-color: transparent;
        border: 2px solid rgba(0, 0, 0, .2);
        color: #fff;
        border-radius: 10px;
        padding: 30px 40px;
    }

    .wrapper h1 {
        font-size: 36px;
        text-align: center;
    }

    .wrapper .input-box {
        position: relative;
        width: 100%;
        height: 50px;
        margin: 30px 0;
    }

    .input-box input{
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        border: 2px solid rgba(255, 255, 255, 255);
        border-radius: 40px;
        font-size: 16px;
        color: #fff;
        padding: 20px 45px 20px 20px;
    }

    .input-box input::placeholder {
        color: #fff;
    }

    .input-box i {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
    }

    .wrapper .remember-forgot {
        display: flex;
        justify-content: space-between;
        font-size: 14.5px;
        margin: -15px 0 15px;
    }

    .remember-forgot label input {
        accent-color: #fff;
        margin-right: 3px;
    }

    .remember-forgot a {
        color: #fff;
        text-decoration: none;
    }

    .remember-forgot a:hover {
        text-decoration: underline;
    }
    .wrapper .btn {
        width: 100%;
        height: 45px;
        background: #fff;
        border: none;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        cursor: pointer;
        font-size: 16px;
        color: #333;
        font-weight: 600;
    }
    .input_wrap .error_msg {
        text-align: center;
        justify-content: center;
    }
    .wrapper .register-account {
        font-size: 14.5px;
        text-align: center;
        margin-top: 20px;
        margin: 20px 0 15px;
    }

    .register-account p a {
        color: #fff;
        text-decoration: none;
        font-weight: 600;
    }

    .register-account p a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>
<div class="wrapper">
    <form action="login.php" method="post">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" name="email_or_username" placeholder="Email or Username" required>
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class="fa-solid fa-lock"></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox" name="remember"> Remember Me</input></label>
            <a href="#">Forgot Password?</a>
        </div>
        <div class="input_wrap">
            <span class="error_msg"><?php echo $error_message; ?></span>
            <button type="submit" class="btn">Login</button>
            <div class="register-account">
                <p>Don't Have An Account? <a href="register.html">Register</a></p>
            </div>
        </div>
    </form>
</div>

</body>
</html>