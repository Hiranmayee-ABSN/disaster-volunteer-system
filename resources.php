<?php
session_start();
$page = "resources";

// Initialize volunteer count in session if not set or malformed
if (!isset($_SESSION['volunteers'])) {
    $_SESSION['volunteers'] = 30;
}

// Safely get the total volunteer count
$volunteers = is_array($_SESSION['volunteers']) 
    ? array_sum($_SESSION['volunteers']) 
    : $_SESSION['volunteers'];

// Initialize tracked/helped
$tracked = $_POST['tracked'] ?? 100;
$helped = $_POST['helped'] ?? 60;

// Increase values only when "Add Helped" is clicked
if (isset($_POST['add'])) {
    $tracked++;
    $helped++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resources</title>
    <style>
        body {
            background-color: black;
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 20px;
        }

        .dashboard-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            color: #000;
        }

        form {
            margin-bottom: 30px;
        }

        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        form .button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2ecc71;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .card {
            background: #221C35;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card h3 {
            color: #fff;
        }

        canvas {
            width: 100% !important;
            height: 400px !important;
        }

        .contact-link {
            text-align: center;
            margin-top: 20px;
        }

        .contact-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin: 5px;
        }
    </style>
</head>
<body class="<?php echo $page; ?>">
    <div class="dashboard-container">
        <!-- Form Section -->
        <form method="POST">
            <label for="tracked">Total Resources Tracked:</label>
            <input type="text" name="tracked" value="<?= $tracked ?>" readonly>

            <label for="helped">Total People Helped:</label>
            <input type="text" name="helped" value="<?= $helped ?>" readonly>

            <label for="volunteers">Number of Volunteers:</label>
            <input type="text" name="volunteers" value="<?= $volunteers ?>" readonly>

            <button class="button" name="add">Add Helped</button>
        </form>

        <!-- Bar Chart Section -->
        <div class="card">
            <h3>Resources Tracked (Bar Chart)</h3>
            <canvas id="barChart"></canvas>
        </div>

        <!-- Pie Chart Section -->
        <div class="card">
            <h3>Helped vs Remaining (Pie Chart)</h3>
            <canvas id="pieChart"></canvas>
        </div>

        <!-- Contact and Dashboard Buttons -->
        <div class="contact-link">
            <a href="dashboard.php">Back to Dashboard</a>
            <a href="contact.php">Contact Us</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const tracked = <?= $tracked ?>;
    const helped = <?= $helped ?>;
    const remaining = tracked - helped;

    // Bar Chart
    new Chart(document.getElementById("barChart"), {
        type: 'bar',
        data: {
            labels: ['Resources Tracked'],
            datasets: [{
                label: 'Tracked',
                data: [tracked],
                backgroundColor: 'rgba(52, 152, 219, 0.8)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Pie Chart
    new Chart(document.getElementById("pieChart"), {
        type: 'pie',
        data: {
            labels: ['People Helped', 'Remaining'],
            datasets: [{
                data: [helped, remaining],
                backgroundColor: ['rgba(46, 204, 113, 0.8)', 'rgba(231, 76, 60, 0.8)']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
    </script>
</body>
</html>
