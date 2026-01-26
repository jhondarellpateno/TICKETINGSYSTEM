<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Crimson Edge</title>

    <?php

    session_start();
    include "db.php";

    $error = "";

    if (isset($_POST['login'])){

        $email = $_POST['username'];
        $password = $_POST['password'];

        $check = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
        $user = mysqli_fetch_assoc($check);

        if ( $user && password_verify ($password, $user['password'])){
            $_SESSION['email'] = $user['email'];

            header ("Location: dash.php");
            exit;
        }
        else{

        $error = "Email and Password is Incorrect!";
        }
       
    }

    ?>
    <style>
        /* --- General Styles --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background: radial-gradient(circle at center, #4b0000 0%, #0a0a0a 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
        }

        /* --- Login Card --- */
        .login-container {
            background: rgba(20, 20, 20, 0.8);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 400px;
            border: 1px solid rgba(255, 46, 46, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .login-container h2 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #ff4d4d;
        }

        .login-container p {
            color: #888;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }

        /* --- Form Elements --- */
        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.85rem;
            color: #ccc;
            padding-left: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            background: #111;
            border: 1px solid #333;
            border-radius: 10px;
            color: white;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #ff2e2e;
            box-shadow: 0 0 8px rgba(255, 46, 46, 0.3);
            background: #1a1a1a;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background: #b30000;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-btn:hover {
            background: #ff2e2e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 46, 46, 0.4);
        }

        /* --- Links --- */
        .options {
            margin-top: 20px;
            font-size: 0.85rem;
        }

        .options a {
            color: #ff4d4d;
            text-decoration: none;
            transition: color 0.2s;
        }

        .options a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .back-home {
            display: inline-block;
            margin-top: 25px;
            font-size: 0.8rem;
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-home:hover {
            color: #888;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Welcome Back</h2>

        

        <p>Please enter your details to sign in.</p>

        <form action="#" method="POST" >
            <div class="form-group">
                <label for="username">Username or Email</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="form-group">    
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <?php if ($error): ?>
            <p style="color:red; text-align:center;"><?php echo $error; ?></p>
            <?php endif; ?>

            <button type="submit" name = "login" class="login-btn">Sign In</button>
        </form>

        <div class="options">
            <span>Don't have an account?</span> <a href="register.php">Create Account</a>
        </div>

        <a href="index.php" class="back-home">&larr; Back to Home</a>
    </div>

</body>
</html>