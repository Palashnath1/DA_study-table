<?php
include("connect.php");
session_start(); // Start session to track the user

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent SQL Injection
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if the user exists with the exact username and password
    $sql = "SELECT * FROM `register` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        // SUCCESS: User found
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id']; // Store user info in session
        $_SESSION['username'] = $row['username'];

        echo "<!DOCTYPE html><html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head><body style='background-color: #0b1120;'>";
        echo "<script>
            Swal.fire({
                title: 'Login Successful!',
                text: 'Welcome back, " . $row['username'] . "!',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Enter Site'
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script></body></html>";
    } else {
        // FAILURE: Incorrect credentials
        $message = "username and password not match!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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

        .reg-container {
            position: relative;
            background-color: #000;
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
            background: url('https://cdn-icons-png.flaticon.com/512/3135/3135715.png') no-repeat center center;
            background-size: contain;
            background-color: #fff;
            border-radius: 50%;
        }

        .reg-container h2 {
            color: #fff;
            margin-bottom: 30px;
            margin-top: 20px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            color: #fff;
            margin-bottom: 8px;
            font-size: 14px;
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

        .submit-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #ff3b3b;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .error { color: #ff3b3b; font-size: 14px; margin-bottom: 15px; font-weight: bold; }
        .register-link { color: #aaa; font-size: 13px; display: block; margin-top: 15px; text-decoration: none; }
    </style>
</head>
<body>

    <div class="reg-container">
        <div class="user-icon"></div>
        <h2>Login Here</h2>
        
        <?php if($message != "") { echo "<p class='error'>$message</p>"; } ?>

        <form method="POST">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter Username" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="submit-btn">Login</button>
            <a href="register.php" class="register-link">Don't have an account? Register Here</a>
        </form>
    </div>

</body>
</html>