<?php
    include('session.php');
    $projectName = "Early Detection and Prevention Strategies for Heart Issues";
    $contactNumbers = array("+91-9860589573", "+91-9403024291");
    $email = "hearthealth@example.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - <?php echo $projectName; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="nav_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #fff; /* White background */
            font-family: Arial, sans-serif;
        }
        .page-wrapper {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            width: 90%;
            max-width: 900px;
            background:rgb(235, 243, 255); /* Same as body background */
            border-radius: 10px;
            padding: 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            text-align: center;
        }
        h1 {
            color: #1d2a3a;
            font-size: 2.5em;
        }
        p {
            font-size: 20px;
            margin: 20px 0;
        }
        .contact-info {
            margin-top: 30px;
        }
        .contact-info a {
            text-decoration: none;
            color: #1d2a3a;
            font-size: 18px;
            margin: 15px 0;
            display: block;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        .contact-icon {
            margin-right: 10px;
        }
        footer {
            background-color: #1d2a3a;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        @media (max-width: 600px) {
            .container {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="page-wrapper">
        <div class="content">
            <div class="container">
                <h1><b>Contact Us</b></h1>
                <p>For any inquiries please feel free to contact us:</p>
                <div class="contact-info">
                    <?php foreach ($contactNumbers as $number) {
                        echo "<a href='tel:$number'><i class='fas fa-phone contact-icon'></i> $number</a>";
                    } ?>
                    <a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope contact-icon"></i> <?php echo $email; ?></a>
                </div>
            </div>
        </div>
        <footer>
            <p>© <span id="year"></span> Safe Heart. All rights reserved.</p>
        </footer>
    </div>
    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>
</body>
</html>
