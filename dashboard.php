<?php
session_start();
$page = "dashboard";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            height: 100vh;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #8e44ad;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        .left {
            color: white;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .left h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .left img {
            max-width: 80%;
            height: auto;
            border-radius: 12px;
        }

        .right {
            background-color: #1e1e1e;
            color: #fff;
            padding: 60px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        .right h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .intro {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 30px;
            color: #dcdde1;
        }

        .right a,
        .right button {
            display: block;
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .right a:hover,
        .right button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.15);
        }

        .alert-btn {
            background-color: #6c5ce7;
            color: white;
        }

        .resources-btn {
            background-color: #a29bfe;
            color: white;
        }

        .logout-btn {
            background-color: #ff7675;
            color: white;
        }

        .logout-btn:hover {
            background-color: #d63031;
        }

        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="<?php echo $page; ?>">
    <div class="container">
        <div class="left">
            <h1>Welcome back, Volunteer!</h1>
            <img src="https://th.bing.com/th/id/OIP.Bh1D_n7ESsJNLUQJ716bSgHaE8?rs=1&pid=ImgDetMain" alt="Dashboard Illustration">
        </div>
        <div class="right">
            <form action="logout.php" method="POST">
                <button class="logout-btn">Logout</button>
            </form>
            <h2>Volunteer Dashboard</h2>
            <p class="intro">
                Welcome to the Disaster Volunteer System (DVS). This platform allows volunteers to stay informed and prepared for natural and man-made disasters. 
                Use the dashboard to check real-time alerts and access essential resources to support affected communities effectively.
            </p>
            <a class="alert-btn" href="alert.php">Check Disaster Alert</a>
            <a class="resources-btn" href="resources.php">Resources</a>
        </div>
    </div>
</body>
</html>
