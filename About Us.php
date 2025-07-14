<?php
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Early Detection and Prevention Strategies for Heart Issues</title>

    <!-- Bootstrap & jQuery (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="nav_profile.css" />

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        /* Hero Section */
        .hero-section {
            background-image: url('aboutus.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }


        /* About Section */
        .about-section {
            padding: 50px 20px;
            background: white;
            flex: 1;
        }

        .about-section h2 {
            color:rgb(255, 8, 0);
            font-weight: bold;
            margin-bottom: 30px;
        }

        .about-section p {
            font-size: 18px;
            color: #333;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .developers {
            font-size: 18px;
            color: #555;
            margin-top: 40px;
        }

        footer {
            background-color: #1d2a3a;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php include('navbar.php'); ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div>
            <h1>Early Detection and Prevention Strategies for Heart Issues</h1>
            <p>Your heart health is our priority.</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container text-center">
            <h2>About Us</h2>
            <p>This BE project aims to create a system that helps detect heart problems early using modern technology. Heart disease is one of the leading causes of death worldwide, but many issues can be prevented if caught early. Our platform provides simple tools and clear advice to help people understand their heart health.</p>
            <p>We use advanced methods, including AI and data analysis, to evaluate risk factors and provide personalized recommendations. This helps users take preventive steps and make healthier lifestyle choices before serious problems arise.</p>
            <p>Our goal is to empower individuals and healthcare providers with accessible and reliable information for better heart health management.</p>
            <div class="developers">
                <strong>Developed by:</strong> Prasad Pund, Shivdas Mente, Aditya Kavitkar, Sachin Sonner, Prasad Pund
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© <span id="year"></span> Safe Heart. All rights reserved.</p>
    </footer>

    <script>
        // Set the current year in the footer
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>

</body>

</html>