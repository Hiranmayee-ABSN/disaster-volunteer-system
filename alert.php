<?php
session_start(); // Start the session
$page = "alert";

// If the session variable is not an array or not set, reinitialize it
if (!isset($_SESSION['volunteers']) || !is_array($_SESSION['volunteers'])) {
    $_SESSION['volunteers'] = [
        'vizag' => 30,
        'vijayawada' => 25
    ];
}

// Get form response and location
$response = $_POST['response'] ?? null;
$location = $_POST['location'] ?? null;

// If accepted, increase the appropriate location's volunteer count
if ($response === "accept" && isset($_SESSION['volunteers'][$location])) {
    $_SESSION['volunteers'][$location]++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Disaster Alerts</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background-image: url("images/842.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: #333;
            padding: 40px;
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            max-width: 600px;
            margin: 30px auto;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            text-align: center;
        }

        h3 {
            margin-top: 0;
        }

        .button {
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }

        a.button {
            text-decoration: none;
        }

        .red { background-color: #e74c3c; }
        .blue { background-color: #3498db; }
        .green { background-color: #2ecc71; }
    </style>
</head>
<body class="<?php echo $page; ?>">

    <!-- Vizag Alert -->
    <div class="card">
        <h3>🚨 Disaster Alert - Vizag!</h3>
        <a href="https://www.google.com/maps/search/?api=1&query=GVPCE+Vizag" 
           target="_blank" class="button blue">Open in Google Maps</a>
        <p>Disaster at: <strong>GVPCE, Vizag</strong></p>

        <form method="POST">
            <input type="hidden" name="location" value="vizag">
            <button class="button green" name="response" value="accept">Accept</button>
            <button class="button red" name="response" value="decline">Decline</button>
        </form>

        <?php if ($response && $location === "vizag"): ?>
            <div style="margin-top: 20px; background: #ecf0f1; padding: 15px; border-radius: 5px;">
                <strong>Status:</strong>
                <?= $response === "accept" 
                    ? "Accepted as Volunteer 💪 (Total: {$_SESSION['volunteers']['vizag']})" 
                    : "Declined ❌" ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Benz Circle Vijayawada Alert -->
    <div class="card">
        <h3>🚨 Disaster Alert - Benz Circle, Vijayawada!</h3>
        <a href="https://www.google.com/maps/search/?api=1&query=Benz+Circle+Vijayawada" 
           target="_blank" class="button blue">Open in Google Maps</a>
        <p>Disaster at: <strong>Benz Circle, Vijayawada</strong></p>

        <form method="POST">
            <input type="hidden" name="location" value="vijayawada">
            <button class="button green" name="response" value="accept">Accept</button>
            <button class="button red" name="response" value="decline">Decline</button>
        </form>

        <?php if ($response && $location === "vijayawada"): ?>
            <div style="margin-top: 20px; background: #ecf0f1; padding: 15px; border-radius: 5px;">
                <strong>Status:</strong>
                <?= $response === "accept" 
                    ? "Accepted as Volunteer 💪 (Total: {$_SESSION['volunteers']['vijayawada']})" 
                    : "Declined ❌" ?>
            </div>
        <?php endif; ?>
    </div>

    <div style="text-align: center;">
        <a href="dashboard.php" class="button blue">&larr; Back to Dashboard</a>
        <a href="contact.php" class="button blue">Contact Us</a>
    </div>

</body>
</html>
