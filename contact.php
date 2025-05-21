<?php
$page = "contact";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
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
            margin: auto;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, textarea {
            margin: 10px 0;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            background-color: #2ecc71;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #27ae60;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
        }

        .contact-list {
            margin-top: 30px;
        }

        .contact-list ul {
            list-style: none;
            padding: 0;
        }

        .contact-list li {
            padding: 8px 0;
        }

        .contact-title {
            margin-top: 30px;
            font-weight: bold;
        }
    </style>
</head>
<body class="<?php echo $page; ?>">
    <div class="card">
        <h2>Contact Us</h2>
        <form method="POST" action="#">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea rows="5" name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>

        <div class="contact-list">
            <h3>NGO Contacts</h3>
            <ul>
                <li><strong>Helping Hands:</strong> +91 988 567 8901</li>
                <li><strong>Relief India Trust:</strong> +91 98765 43210</li>
                <li><strong>Smile Foundation:</strong> +91 90123 45678</li>
            </ul>

            <h3>Government Agencies</h3>
            <ul>
                <li><strong>Disaster Management Helpline:</strong> 1078 (India)</li>
                <li><strong>National Emergency Number:</strong> 112</li>
                <li><strong>Local Police Station:</strong> +91 855 423 4567</li>
            </ul>
        </div>

        <a class="back-btn" href="dashboard.php">&larr; Back to Dashboard</a>
    </div>
</body>
</html>
