<?php
session_start();

include("connect.php"); 

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM `admin` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $admin_data = mysqli_fetch_assoc($result);
        
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $admin_data['email'];
        
        // Redirect to the dashboard
        header("Location: deshboard.php");
        exit();
    } else {
        // Authentication failed
        $error_message = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            background-color: #505b6b; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }

        .login-container {
            position: relative;
            background-color: #000; /* Black login box from image_2.png */
            padding: 40px;
            border-radius: 8px;
            text-align: center;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .user-icon {
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 100px;
            background: url('https://www.pngkey.com/png/full/114-1149878_setting-user-png-image-background-login-icon-png.png') no-repeat center center; /* Placeholder icon */
            background-size: contain;
        }

        .login-container h2 {
            color: #fff;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            color: #fff;
            margin-bottom: 8px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 0;
            background: transparent;
            border: none;
            border-bottom: 1px solid #fff;
            color: #fff;
            outline: none;
        }

        .input-group input::placeholder {
            color: #aaa;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-bottom: 25px;
        }

        .forgot-password a {
            color: #aaa;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password a:hover {
            color: #fff;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #ff3b3b; /* Red button color from image_2.png */
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #e60000;
        }

        .error-message {
            color: #ff3b3b;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="user-icon"></div>
        <h2>Admin Login</h2>
        <?php if (!empty($error_message)) : ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email Address" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="forgot-password">
                <a href="#">Forget Password?</a>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>

</body>
</html>