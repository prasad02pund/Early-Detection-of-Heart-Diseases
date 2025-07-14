
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Info Adavance</title>

    <!-- Bootstrap & jQuery (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333 !important;
            height: 80px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            background: url('image/about.jpg') no-repeat center center/cover;;
         
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
        }

            .about-section h2 {
                color: #d9534f;
                font-weight: bold;
            }

            .about-section p {
                font-size: 18px;
                color: black;
                line-height: 1.6;
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
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <img src="image/logo.png" alt="Safe Heart Logo" style="height: 50px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="aboutForLogin.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="Login.php" class="nav-link">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="hero-section">
        <div>
            <h1>Early Detection & Prevention for Heart Issues</h1>
            <p>Your heart health is our priority.</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container text-center">
            <h2>About Us</h2>
            <p>Our mission is to provide cutting-edge technology and strategies for early detection and prevention of heart diseases. By utilizing AI-driven diagnostics and personalized health insights, we empower individuals to take charge of their heart health.</p>
            <p>We believe prevention is better than cure, and our platform offers real-time risk assessments, lifestyle recommendations, and expert guidance to ensure a healthier future for all.</p>
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