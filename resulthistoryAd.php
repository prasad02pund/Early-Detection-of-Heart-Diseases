<?php
include('navbar.php');
include('db.php'); // Ensure this file contains database connection details
?><?php
    if (isset($_GET['reportid'])) {
        $reportid = $_GET['reportid'];
        // Fetch data from the database
        $query = "SELECT * FROM advanceddata WHERE reportid = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $reportid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Assigning variables
            $date = $row['date'];
            $fullname = $row['fullname'];
            $gender = $row['gender'];
            $age = $row['age'];
            $dob = $row['dob'];
            $height = $row['height'];
            $weight = $row['weight'];
            $bmi = $row['bmi'];
            $bp = $row['bp'];
            $chestPain = $row['chestpain'];
            $heartrate = $row['heartrate'];
            $smoking = $row['smoking'];
            $alcohol = $row['alcohol'];
            $ldlcholesterol = $row['ldlcholesterol'];
            $hdlcholesterol = $row['hdlcholesterol'];
            $acidity = $row['acidity'];
            $obesity = $row['obesity'];
            $asthma = $row['asthma'];
            $sleepingschedule = $row['sleepingschedule'];
            $hypertension = $row['hypertension'];
            $bloodsugar = $row['bloodsugar'];
            $hearthistory = $row['hearthistory'];
            $stresslevel = $row['stresslevel'];
            $output = $row['output'];
            $responseAI = $row['responseAI']; // Assuming this holds the risk level
        } else {
            echo "No data found for Report ID: $reportid";
            exit();
        }
    } else {
        echo "Report ID not provided.";
        exit();
    }
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Report - Heart Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="nav_profile.css">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .progress {
            height: 30px;
            border-radius: 12px;
        }

        .progress-bar {
            transition: width 0.5s ease-in-out;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            line-height: 30px;
        }

        .risk-message {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        .health-tips {
            background: #e9f5e9;
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
        }

        .text-center {
            color: black;
        }

        .logo {
            padding: 10px;
        }

        @media (max-width: 576px) {
            .container {
                padding: 10px;
            }

            .progress {
                height: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="container mt-4" id="health-report">
        <div style="height: 80px; background-color: #1d2a3a; display: flex; justify-content: center; align-items: center;">
            <img src="image/logo.png" alt="Safe Heart Logo" class="logo" style="height:75px;">
        </div>
        <br>
        <h2 class="text-center">Health Report</h2>
        <div class="row mb-3">
            <div class="col-md-6"><strong>Report ID:</strong> <?php echo $reportid ?></div>
            <div class="col-md-6 text-end"><strong>Date:</strong> <?php echo $date ?></span></div>
        </div>
        <div class="row">
            <div class="col-md-6"><strong>Name:</strong> <?php echo $fullname ?></div>
            <div class="col-md-6"><strong>Gender:</strong> <?php echo $gender ?></div>
            <div class="col-md-6"><strong>Age:</strong> <?php echo $age ?></div>
            <div class="col-md-6"><strong>Date of Birth:</strong> <?php echo $dob ?></div>
            <div class="col-md-6"><strong>Height:</strong> <?php echo $height ?></div>
            <div class="col-md-6"><strong>Weight:</strong> <?php echo $weight ?></div>
            <div class="col-md-6"><strong>BMI:</strong> <?php echo $bmi ?></div>
            <div class="col-md-6"><strong>Blood Pressure:</strong> <?php echo $bp ?></div>
            <div class="col-md-6"><strong>Chest Pain:</strong> <?php echo $chestPain ?></div>
            <div class="col-md-6"><strong>Heart Rate:</strong> <?php echo $heartrate ?></div>
            <div class="col-md-6"><strong>Smoking:</strong> <?php echo $smoking ?></div>
            <div class="col-md-6"><strong>Alcohol:</strong> <?php echo $alcohol ?></div>
            <div class="col-md-6"><strong>LDL cholesterol:</strong> <?php echo $ldlcholesterol ?></div>
            <div class="col-md-6"><strong>HDL cholesterol:</strong> <?php echo $hdlcholesterol ?></div>
            <div class="col-md-6"><strong>Acidity:</strong> <?php echo $acidity ?></div>
            <div class="col-md-6"><strong>Obesity:</strong> <?php echo $obesity ?></div>
            <div class="col-md-6"><strong>Asthma:</strong> <?php echo $asthma ?></div>
            <div class="col-md-6"><strong>Sleeping Schedule:</strong> <?php echo $sleepingschedule ?></div>
            <div class="col-md-6"><strong>Hypertension:</strong> <?php echo $hypertension ?></div>
            <div class="col-md-6"><strong>Blood Sugar:</strong> <?php echo $bloodsugar ?></div>
            <div class="col-md-6"><strong>Heart Disease History:</strong> <?php echo $hearthistory ?></div>
            <div class="col-md-6"><strong>Stress Level:</strong> <?php echo $stresslevel ?></div>
            <div class="col-md-6"><strong>Stress Level:</strong> <?php echo $stresslevel ?></div>
        </div>

        <hr>
        <h4>Heart Disease Risk</h4>
        <div class="progress mt-3">
            <div class="progress-bar" id="heart-risk-bar" style="width: 0%">0/5</div>
        </div>
        <p id="risk-message" class="mt-2 text-center text-danger"></p>


        <div class="container mt-4" id="suggestions-page">
            <h2 class="text-center">Tiny steps, big changes — let’s start with this!</h2>
            <p style="margin-top: 10px; text-align: justify;"><?php echo nl2br(htmlspecialchars($responseAI)); ?></p>
        </div>
    </div>
    <div class="save-btn mt-3 text-center">
        <button class="btn btn-danger" onclick="saveAsPDF()">Download PDF</button>
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>© <span id="year"></span> Safe Heart. All rights reserved.</p>
    </footer>
    <script>
        //document.getElementById("report-date").textContent = new Date().toLocaleDateString('en-GB').replace(/\//g, '-');
        //document.getElementById("year").textContent = new Date().getFullYear();

        $(document).ready(function() {
            const riskLevel = <?php echo $output ?>; // Replace with the result value from your Python module
            const progressBar = document.getElementById("heart-risk-bar");
            const riskMessage = document.getElementById("risk-message");
            const healthTips = document.getElementById("health-tips");
            let riskPercentage = (riskLevel / 5) * 100;

            // Define colors and messages based on risk level
            let color = "bg-success",
                message = "Low risk. Keep up your healthy habits!",
                tips = "Maintain a balanced diet and regular exercise.";
            if (riskLevel === 2 || riskLevel === 3) {
                color = "bg-warning";
                message = "Moderate risk. Consider improving your lifestyle.";
                tips = "Increase physical activity, eat more fruits and vegetables.";
            } else if (riskLevel === 4) {
                color = "bg-orange";
                message = "High risk. Immediate lifestyle changes needed.";
                tips = "Avoid smoking and alcohol, reduce stress, and monitor your diet.";
            } else if (riskLevel === 5) {
                color = "bg-danger";
                message = "Severe risk! Seek medical advice.";
                tips = "Consult a doctor, follow a strict heart-healthy diet, and manage stress effectively.";
            }

            progressBar.style.width = riskPercentage + "%";
            progressBar.className = "progress-bar " + color;
            progressBar.textContent = riskLevel + "/5";
            riskMessage.textContent = message;
            healthTips.textContent = "Tip: " + tips;
        });


        function saveAsPDF() {
            const element = document.getElementById("health-report");

            html2canvas(element, {
                scale: 2
            }).then(canvas => {
                const {
                    jsPDF
                } = window.jspdf;
                const pdf = new jsPDF('p', 'mm', 'a4');

                const pageWidth = 210; // A4 width in mm
                const pageHeight = 297; // A4 height in mm
                const margin = 10;

                const canvasWidth = canvas.width;
                const canvasHeight = canvas.height;

                const imgWidth = pageWidth - 2 * margin;
                const imgHeight = (canvasHeight * imgWidth) / canvasWidth;

                const pageCanvasHeight = ((pageHeight - 2 * margin) * canvasWidth) / imgWidth;
                let remainingHeight = canvasHeight;
                let position = 0;
                let pageCount = 0;

                while (remainingHeight > 0) {
                    const pageCanvas = document.createElement("canvas");
                    pageCanvas.width = canvasWidth;
                    pageCanvas.height = Math.min(pageCanvasHeight, remainingHeight);

                    const ctx = pageCanvas.getContext("2d");
                    ctx.drawImage(
                        canvas,
                        0, position,
                        canvasWidth, pageCanvas.height,
                        0, 0,
                        canvasWidth, pageCanvas.height
                    );

                    const pageImgData = pageCanvas.toDataURL("image/png");
                    const pageImgHeight = (pageCanvas.height * imgWidth) / canvasWidth;

                    if (pageCount > 0) {
                        pdf.addPage();
                    }

                    pdf.addImage(pageImgData, 'PNG', margin, margin, imgWidth, pageImgHeight);

                    remainingHeight -= pageCanvasHeight;
                    position += pageCanvasHeight;
                    pageCount++;
                }

                pdf.save("Health_Report.pdf");
            });
        }
    </script>
</body>

</html>