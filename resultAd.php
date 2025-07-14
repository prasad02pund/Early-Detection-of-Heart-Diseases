<?php
if (isset($_GET['data'])) {
    $receivedData = json_decode($_GET['data'], true);

    $username = $receivedData[0];
    $reportid = $receivedData[1];
    $date = $receivedData[2];
    $fullname = $receivedData[3];
    $dob = $receivedData[4];
    $gender = $receivedData[5];
    $age = $receivedData[6];
    $height = $receivedData[7];
    $weight = $receivedData[8];
    $bmi = $receivedData[9];
    $chestPain = $receivedData[10];
    $bp = $receivedData[11];
    $heartrate = $receivedData[12];
    $ldlcholesterol = $receivedData[13];
    $hdlcholesterol = $receivedData[14];
    $acidity = $receivedData[15];
    $obesity = $receivedData[16];
    $asthma = $receivedData[17];
    $smoking = $receivedData[18];
    $alcohol = $receivedData[19];
    $sleepingschedule = $receivedData[20];
    $hypertension = $receivedData[21];
    $bloodsugar = $receivedData[22];
    $hearthistory = $receivedData[23];
    $stresslevel = $receivedData[24];
    $output = $receivedData[25];
    $responseData = "";


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
    <?php include('navbar.php'); ?>
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
            <p><?php echo $responseData; ?></p>
        </div>
        <hr>
        <h4>Heart Disease Risk</h4>
        <div class="progress mt-3">
            <div class="progress-bar" id="heart-risk-bar" style="width: 0%">0/5</div>
        </div>
        <p id="risk-message" class="mt-2 text-center text-danger"></p>
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
                const imgData = canvas.toDataURL("image/png");
                const {
                    jsPDF
                } = window.jspdf;
                let doc = new jsPDF('p', 'mm', 'a4');
                const imgWidth = 190; // Fit within A4 width
                const imgHeight = (canvas.height * imgWidth) / canvas.width; // Scale proportionally
                doc.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
                doc.save("Health_Report.pdf");
            });
        }
    </script>
</body>

</html>