<?php
// dashboard.php (acts as index)
session_start();
$page = "dashboard"; // For body class or logic
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Dashboard</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            background-image: url("images/agratajmahal.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
        }

        .center-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            gap: 20px;
            backdrop-filter: blur(5px);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        .button {
            padding: 12px;
            width: 100%;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px 0;
            text-decoration: none;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .red { background-color: #e74c3c; }
        .green { background-color: #2ecc71; }
    </style>
</head>
<body class="<?php echo $page; ?>">
    <div class="center-container">
        <form action="logout.php" method="POST">
            <button class="button red">Logout</button>
        </form>

        <div class="card">
            <h2>Volunteer Dashboard</h2>
            <a class="button blue" href="alert.php">Check Disaster Alert</a>
            <a class="button green" href="resources.php">Resources</a>
        </div>
    </div>
</body>
</html>
