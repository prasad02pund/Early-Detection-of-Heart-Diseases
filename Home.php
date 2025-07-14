<?php
 include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Care</title>

    <!-- Bootstrap & jQuery (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="nav_profile.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f3f7;
            margin: 0;
            padding: 0;
        }

        
   
        .hero-section {
            background-color: #1d2a3a;
            color: white;
            padding: 100px 20px;
            text-align: center;
        }

            .hero-section h1 {
                font-size: 4em;
                font-weight: 700;
            }

            .hero-section p {
                font-size: 1.3em;
                margin-top: 20px;
            }

        .cta-buttons {
            margin-top: 30px;
        }

            .cta-buttons .btn {
                padding: 12px 30px;
                font-size: 1.2em;
                border-radius: 30px;
                margin: 0 10px;
            }

            .cta-buttons .btn-primary {
                background-color: #2c7a5b;
                color: white;
                border: none;
            }

                .cta-buttons .btn-primary:hover {
                    background-color: #217c4b;
                }

            .cta-buttons .btn-secondary {
                background-color: #4e8c9e;
                color: white;
                border: none;
            }

                .cta-buttons .btn-secondary:hover {
                    background-color: #35767d;
                }

        .feature-section {
            background-color: #fff;
            padding: 60px 20px;
            text-align: center;
        }

            .feature-section h2 {
                font-size: 2.8em;
                margin-bottom: 30px;
            }

        .feature-cards {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            flex-wrap: wrap;
        }

        .feature-card {
            background-color: #f7f7f7;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

            .feature-card:hover {
                transform: translateY(-10px);
            }

            .feature-card img {
                width: 100%;
                height: 180px;
                object-fit: cover;
                border-radius: 10px;
            }

            .feature-card h3 {
                margin-top: 20px;
                font-size: 1.7em;
                color: #333;
            }

            .feature-card p {
                margin-top: 10px;
                color: #666;
            }

        footer {
            background-color: #1d2a3a;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
 
       

        @media (max-width: 768px) {
            .cta-buttons .btn {
                padding: 10px 20px;
                font-size: 1em;
            }

            .hero-section h1 {
                font-size: 2.8em;
            }

            .hero-section p {
                font-size: 1em;
            }

            .feature-cards {
                flex-direction: column;
                align-items: center;
            }

            .feature-card {
                width: 90%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

   
   <?php
   include('navbar.php');
   
   ?>
    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Prioritize Your Heart’s Wellbeing</h1>
        <p>Take the first step towards a healthier heart and a better life.</p>
        <div class="cta-buttons">
            <a href="regular.php" class="btn btn-primary">Quick Risk Check</a>
            <a href="Advance.php" class="btn btn-secondary">Detailed Risk Analysis</a>
        </div>
    </div>

    <!-- Feature Section -->
    <div class="feature-section">
        <h2>Why Heart Health Matters</h2>
        <div class="feature-cards">
            <div class="feature-card">
                <img src="image/hearthelth.jpg" alt="Healthy Heart">
                <h3>Keep Your Heart Strong</h3>
                <p>Discover the benefits of daily exercise and balanced eating for a healthy heart.</p>
            </div>
            <div class="feature-card">
                <img src="image/ImgPrev.jpg" alt="Heart Disease Prevention">
                <h3>Reduce Heart Risks</h3>
                <p>Learn about the main causes of heart disease and how to protect your heart.</p>
            </div>
            <div class="feature-card">
                <img src="image/ImgAdvT.jpg" alt="Advanced Treatments">
                <h3>Home-Based Heart Care</h3>
                <p>Discover practical home-based strategies and emerging treatments for managing heart health.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© <span id="year"></span> Safe Heart. All rights reserved.</p>
    </footer>


<script>
        document.getElementById("year").textContent = new Date().getFullYear();

</script>

</body>
</html>


