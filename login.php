<?php
session_start();
$page = "login";
$error = "";

// Redirect if already logged in
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Simple hardcoded login (replace with DB in production)
    if ($username === "volunteer" && $password === "help123") {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login • Volunteer Portal</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            height: 100vh;
            background-color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .container {
            display: flex;
            width: 900px;
            height: 600px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            border-radius: 12px;
            overflow: hidden;
        }

        .left {
            background-color: #1c1c1c;
            padding: 40px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .left input[type="text"],
        .left input[type="password"] {
            background: #2c2c2c;
            color: #fff;
            border: 1px solid #444;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 16px;
            font-size: 15px;
        }

        .left button {
            background-color: #8e44ad;
            border: none;
            color: white;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .left button:hover {
            background-color: #732d91;
        }

        .left .error {
            color: #e74c3c;
            margin-top: 10px;
            font-size: 14px;
        }

        .right {
            background-color: #8e44ad;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 40px;
            text-align: center;
        }

        .right h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .right img {
            max-width: 80%;
            height: auto;
            margin-top: 20px;
        }

        .signup-link {
            margin-top: 20px;
            color: #ccc;
            font-size: 14px;
        }

        .signup-link a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>
<body class="<?php echo $page; ?>">
<div class="container">
    <div class="left">
        <h2>Login</h2>
        <p>Enter your account details</p>
        <form method="POST">
            <input type="text" name="email" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <div class="signup-link">
            Don’t have an account? <a href="signup.php">Sign up</a>

        </div>
    </div>
    <div class="right">
        <h1>Welcome to<br>Disaster Volunteer System</h1>
        <img src="https://verinon.com/wp-content/uploads/2023/06/OpenText-Documentum-Content-Management-Implementation.jpg" alt="Volunteer Illustration">
    </div>
</div>
</body>
</html>
