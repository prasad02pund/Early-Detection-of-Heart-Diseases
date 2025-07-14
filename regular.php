<?php
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Info Regular</title>

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
            background: #1D2A3A;
            background: linear-gradient(180deg, rgba(29, 42, 58, 1) 15%, rgba(56, 87, 115, 1) 25%, rgba(105, 156, 207, 1) 100%);
            margin: 0;
            padding: 0;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 95vh;
            margin-top: 0px;
            padding: 20px;
        }

        .form-box {
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 1300px;
        }

        .form-box h2 {
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: bold;
            color: #fff;
        }

        .form-box label {
            font-weight: 500;
            color: white;
        }

        .form-box .form-control {
            background-color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: black;
        }

        /* Hover effect for input fields */
        .form-box .form-control:hover {
            background-color: white;
            /* Lighten background on hover */
            border-color: #72c7c4;
            /* Change border color on hover */
            color: black;
            /* Ensure text remains white */
            box-shadow: none;
            /* Remove shadow on hover */
        }

        /* Focus effect for input fields */
        .form-box .form-control:focus {
            background-color: white;
            /* Lighten background on focus */
            border-color: #72c7c4;
            /* Change border color on focus */
            color: black;
            /* Ensure text remains white */
            box-shadow: none;
            /* Remove shadow on focus */
        }

        .form-box .form-control::placeholder {
            color: black;
        }

        .form-box .invalid-feedback {
            color: #ff6b6b;
        }

        .form-box .btn-primary {
            background-color: #3276db;
            border: none;
            padding: 10px 30px;
            font-size: 1rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .form-box .btn-primary:hover {
            background-color: #24c35c;
        }

        .form-box .radio-group {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .form-box .radio-group label {
            margin-right: 15px;
            font-weight: 400;
        }

        .form-box .radio-group input[type="radio"] {
            margin-right: 5px;
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
    <?php
    include('navbar.php');

    ?>
    <!-- Form Section -->
    <div class="form-container">
        <div class="form-box">
            <h2 class="text-center">Unlock Basic Heart Health Understanding</h2>
            <p class="text-center lead" style="color: white; margin: 0 auto;">
                Using a regular dataset ensures standardized health information is collected, emphasizing vital signs and basic risk factors. This approach delivers consistent insights to support routine heart health assessments and helps guide preventative measures effectively.
            </p>
            <br>
            <br>
            <form id="healthForm" method="POST" novalidate>
                <!-- Full Name -->
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $user['fullname']; ?>">
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label>Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="1" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="0" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>

                <!-- Date of Birth -->
                <div class="mb-3">
                    <label>Date of Birth:</label>
                    <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $user['dob']; ?>">
                </div>

                <!-- Age -->
                <div class="mb-3">
                    <label>Age:</label>
                    <input type="text" class="form-control" name="age" id="age" placeholder="Age" readonly>
                </div>

                <!-- Height and Weight -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Height (cm):</label>
                        <input type="number" class="form-control" name="height" id="height" placeholder="Height" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Weight (kg):</label>
                        <input type="number" class="form-control" name="weight" id="weight" placeholder="Weight" required>
                    </div>
                </div>

                <!-- BMI -->
                <div class="mb-3">
                    <label>BMI:</label>
                    <input type="text" class="form-control" name="bmi" id="bmi" placeholder="BMI" readonly>
                </div>

                <!-- Blood Pressure and Heart Rate -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Blood Pressure (mmHg):</label>
                        <input type="text" class="form-control" name="bp" id="bp" placeholder="Blood Pressure" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Heart Rate (bpm):</label>
                        <input type="text" class="form-control" name="heartrate" id="heartrate" placeholder="Heart Rate" required>
                    </div>
                </div>

                <!-- Smoking and Alcohol -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Smoking (no. of times in a day):</label>
                        <input type="number" class="form-control" name="smoking" id="smoking" placeholder="Smoking" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Alcohol (no. of times in a week):</label>
                        <input type="number" class="form-control" name="alcohol" id="alcohol" placeholder="Alcohol" required>
                    </div>
                </div>


                <!-- Health Conditions -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Acidity:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="acidity" value="1" required> Yes</label>
                            <label><input type="radio" name="acidity" value="0"> No</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Obesity:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="obesity" value="1" required> Yes</label>
                            <label><input type="radio" name="obesity" value="0"> No</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Asthma:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="asthma" value="1" required> Yes</label>
                            <label><input type="radio" name="asthma" value="0"> No</label>
                        </div>
                    </div>
                </div>

                <!-- Additional Health Questions -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Fast Breathing During Walking:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="fastbreathing" value="1" required> Yes</label>
                            <label><input type="radio" name="fastbreathing" value="0"> No</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Food Schedule:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="foodschedule" value="0" required> Good</label>
                            <label><input type="radio" name="foodschedule" value="1"> Normal</label>
                            <label><input type="radio" name="foodschedule" value="2"> Poor</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Sleeping Schedule:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="sleepingschedule" value="0" required> Good</label>
                            <label><input type="radio" name="sleepingschedule" value="1"> Normal</label>
                            <label><input type="radio" name="sleepingschedule" value="2"> Poor</label>
                        </div>
                    </div>
                </div>

                <!-- Hypertension and Heart Disease History -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Hypertension:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="hypertension" value="1" required> Yes</label>
                            <label><input type="radio" name="hypertension" value="0"> No</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Heart Disease History:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="hearthistory" value="1" required> Yes</label>
                            <label><input type="radio" name="hearthistory" value="0"> No</label>
                        </div>
                    </div>
                </div>


                <!-- Stress Level -->
                <div class="col-md-4 mb-3">
                    <label>Stress Level:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="stresslevel" value="0" required> Low</label>
                        <label><input type="radio" name="stresslevel" value="1"> Moderate</label>
                        <label><input type="radio" name="stresslevel" value="2"> High</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

        $fullname = escapeshellarg(isset($_POST['fullname']) ? $_POST['fullname'] : '');
        $dob = escapeshellarg(isset($_POST['dob']) ? $_POST['dob'] : '');


        $gender = escapeshellarg(isset($_POST['gender']) ? $_POST['gender'] : '');
        $age = escapeshellarg(isset($_POST['age']) ? $_POST['age'] : '');
        $height = escapeshellarg(isset($_POST['height']) ? $_POST['height'] : '');
        $weight = escapeshellarg(isset($_POST['weight']) ? $_POST['weight'] : '');
        $bmi = escapeshellarg(isset($_POST['bmi']) ? $_POST['bmi'] : '');
        $bp = escapeshellarg(isset($_POST['bp']) ? $_POST['bp'] : '');
        $heartrate = escapeshellarg(isset($_POST['heartrate']) ? $_POST['heartrate'] : '');
        $acidity = escapeshellarg(isset($_POST['acidity']) ? $_POST['acidity'] : '');
        $obesity = escapeshellarg(isset($_POST['obesity']) ? $_POST['obesity'] : '');
        $asthma = escapeshellarg(isset($_POST['asthma']) ? $_POST['asthma'] : '');
        $smoking = escapeshellarg(isset($_POST['smoking']) ? $_POST['smoking'] : '');
        $alcohol = escapeshellarg(isset($_POST['alcohol']) ? $_POST['alcohol'] : '');
        $fastbreathing = escapeshellarg(isset($_POST['fastbreathing']) ? $_POST['fastbreathing'] : '');
        $foodschedule = escapeshellarg(isset($_POST['foodschedule']) ? $_POST['foodschedule'] : '');
        $sleepingschedule = escapeshellarg(isset($_POST['sleepingschedule']) ? $_POST['sleepingschedule'] : '');
        $hypertension = escapeshellarg(isset($_POST['hypertension']) ? $_POST['hypertension'] : '');
        $hearthistory = escapeshellarg(isset($_POST['hearthistory']) ? $_POST['hearthistory'] : '');
        $stresslevel = escapeshellarg(isset($_POST['stresslevel']) ? $_POST['stresslevel'] : '');

        $command = escapeshellcmd("python predictionRe.py $gender $age $height $weight $bmi $bp $heartrate $acidity $obesity $asthma $smoking $alcohol $fastbreathing $foodschedule $sleepingschedule $hypertension $hearthistory $stresslevel");
        $output = shell_exec($command);


        if (isset($_POST['submit'])) {
            if ($output === null) {
                echo "<script>location.reload();</script>";
                //echo "<p>Error running Python script!</p>";
            } else {
                //echo "<h3>Python Output:</h3>";
                //echo "<p>" . htmlspecialchars($output) . "</p>";

                include('session.php');
                include('db.php');

                $reportid = "#" . chr(rand(65, 90)) . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 9);

                $date = date("Y-m-d");

                $fullname =  substr($fullname, 1, -1);

                $dob = substr($dob, 1, -1);

                $gender = substr($gender, 1, -1);
                if ($gender == 1) {
                    $gender = "Male";
                } else {
                    $gender = "Female";
                }

                $age = substr($age, 1, -1);

                $height = substr($height, 1, -1) . " cm";

                $weight = substr($weight, 1, -1) . " kg";

                $bmi = substr($bmi, 1, -1);

                $bp = substr($bp, 1, -1) . " mmHg";
                $heartrate = substr($heartrate, 1, -1) . " bpm";

                $acidity = substr($acidity, 1, -1);
                if ($acidity == 0) {
                    $acidity = "No";
                } else {
                    $acidity = "Yes";
                }

                $obesity = substr($obesity, 1, -1);
                if ($obesity == 0) {
                    $obesity = "No";
                } else {
                    $obesity = "Yes";
                }

                $asthma = substr($asthma, 1, -1);
                if ($asthma == 0) {
                    $asthma = "No";
                } else {
                    $asthma = "Yes";
                }

                $smoking = substr($smoking, 1, -1) . " times/day";
                $alcohol = substr($alcohol, 1, -1) . " times/week";

                $fastbreathing = substr($fastbreathing, 1, -1);
                if ($fastbreathing == 0) {
                    $fastbreathing = "No";
                } else {
                    $fastbreathing = "Yes";
                }

                $foodschedule = substr($foodschedule, 1, -1);
                if ($foodschedule == 0) {
                    $foodschedule = "Good";
                } elseif ($foodschedule == 1) {
                    $foodschedule = "Normal";
                } else {
                    $foodschedule = "Poor";
                }

                $sleepingschedule = substr($sleepingschedule, 1, -1);
                if ($sleepingschedule == 0) {
                    $sleepingschedule = "Good";
                } elseif ($sleepingschedule == 1) {
                    $sleepingschedule = "Normal";
                } else {
                    $sleepingschedule = "Poor";
                }

                $hypertension = substr($hypertension, 1, -1);
                if ($hypertension == 0) {
                    $hypertension = "No";
                } else {
                    $hypertension = "Yes";
                }

                $hearthistory = substr($hearthistory, 1, -1);
                if ($hearthistory == 0) {
                    $hearthistory = "No";
                } else {
                    $hearthistory = "Yes";
                }

                $stresslevel = substr($stresslevel, 1, -1);
                if ($stresslevel == 0) {
                    $stresslevel = "Low";
                } elseif ($stresslevel == 1) {
                    $stresslevel = "Moderate";
                } else {
                    $stresslevel = "High";
                }

                $api_key = "AIzaSyAjtOH-nyELTjHJtazxgRgjnCv3A9YbVYs";

                // Gemini API endpoint
                $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro:generateContent?key=" . urlencode($api_key);


                $responseData = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Health parameters
                    $parameters = [
                        "Age" => $age,
                        "BMI" => $bmi,
                        "Blood Pressure" => $bp,
                        "Heart Rate" => $heartrate,
                        "Acidity" => $acidity,
                        "Obesity" => $obesity,
                        "Asthma" => $asthma,
                        "Smoking" => $smoking,
                        "Alcohol" => $alcohol,
                        "Sleeping Schedule" => $sleepingschedule,
                        "Hypertension" => $hypertension,
                        "Stress Level" => $stresslevel,
                        "Blood Sugar" => $bloodsugar,
                        "Fast Breathing During Walking" => $fastbreathing,
                        "Food Schedule" => $foodschedule
                    ];

                    // Construct prompt
                    $prompt = "";
                    foreach ($parameters as $key => $value) {
                        $prompt .= "$key: $value\n";
                    }

                    $prompt .= "\nTalk about age in heart-related issues. If age is old, suggest taking care  (also consider other parameters, in simple english and one paragraph, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all).\n";
                    $prompt .= "Talk about BMI in heart-related issues. Explain how to control it or maintain it if normal ( also consider other parameters, in paragraph tell about how to control it and also tell about the normal range, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all).\n";
                    $prompt .= "Discuss chest pain, how it feels, and how to control it. If no pain, provide general maintenance advice in  (also consider other parameters, talk about first type of chest pain in short and how to control it also until get treatment what should you do, all in one paragraph, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all).\n";
                    $prompt .= "Provide natural ways to improve blood pressure ( avoid mentioning doctors, also consider other parameters, tell what you we avoid to eat to control the blood pressure tell only indian region food, what type of excersies yoga should we do , all in one paragraph, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all).\n";
                    $prompt .= "Give natural suggestions to control or maintain heart rate ( also consider other parameters, different ways to improve the heart rate diet paln and excersises in indian region, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all).\n";
                    $prompt .= "Talk about blood sugar levels and how to maintain them if high (also consider other parameters,  same for indian diet plan and excersises, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all).\n";
                    $prompt .= "Discuss acidity, obesity, and asthma individually and provide control tips (also consider other parameters, ways to reduce this habits and completely 0, all in one paragrph, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all).\n";
                    $prompt .= "Discuss about fast breathin during walking for a small distance tell how to overcome from this (also consider other parameters,  tell whcih schudle we follow for good sleep, alsi diet and manageing stress level, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all) .\n";
                    $prompt .= "Suggest ways to improve food schedule (also consider other parameters,  tell whcih schudle we follow for good food time, also diet and manageing stress level, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all) .\n";
                    $prompt .= "At last give some more sugesstions to improve and maintain heart health like exercise, etc, all must relate to indian region food activites and enviornment, all contain no bold characters just simple text for all\n";

                    // Prepare API request
                    $data = json_encode([
                        "contents" => [
                            ["parts" => [["text" => $prompt]]]
                        ]
                    ]);

                    // cURL request
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

                    $result = curl_exec($ch);
                    curl_close($ch);

                    // Decode API response
                    $response = json_decode($result, true);

                    if (!empty($response['candidates'][0]['content']['parts'][0]['text'])) {
                        $responseData = $response['candidates'][0]['content']['parts'][0]['text'];
                    } else {
                        $responseData = "Error: Unable to get a response.";
                    }
                }


                $data = [$username, $reportid, $date, $fullname, $dob, $gender, $age, $height, $weight, $bmi, $bp, $heartrate, $acidity, $obesity, $asthma, $smoking, $alcohol, $fastbreathing, $foodschedule, $sleepingschedule, $hypertension, $hearthistory, $stresslevel, $output, $responseData];

                $sql = "INSERT INTO regularData (username, reportid, date, fullname, dob, gender, age, height, weight, bmi, bp, heartrate, acidity, obesity, asthma, smoking, alcohol, fastbreathing, foodschedule, sleepingschedule, hypertension, hearthistory, stresslevel, output, responseAI) 
                VALUES ('$username', '$reportid', '$date', '$fullname', '$dob', '$gender', '$age', '$height', '$weight', '$bmi', '$bp', '$heartrate', '$acidity', '$obesity', '$asthma', '$smoking', '$alcohol', '$fastbreathing', '$foodschedule', '$sleepingschedule', '$hypertension', '$hearthistory', '$stresslevel', '$output', '$responseData')";

                $conn->query($sql);

                echo "<script>
                let values = " . json_encode($data) . ";
                window.location.href = 'resultRe.php?data=' + encodeURIComponent(JSON.stringify(values));
              </script>";
            }
        }
    }
    ?>


    <!-- Footer -->
    <footer>
        <p>© <span id="year"></span> Safe Heart. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            calculateAge(); // Calculate age on page load

            document.getElementById('dob').addEventListener('change', calculateAge);
        });

        function calculateAge() {
            var dobField = document.getElementById('dob');
            var ageField = document.getElementById('age');

            if (dobField.value) {
                var dob = new Date(dobField.value);
                var ageDiff = new Date().getFullYear() - dob.getFullYear();
                ageField.value = ageDiff;
            }
        }

        document.getElementById('height').addEventListener('input', calculateBMI);
        document.getElementById('weight').addEventListener('input', calculateBMI);

        function calculateBMI() {
            var height = document.getElementById('height').value / 100;
            var weight = document.getElementById('weight').value;
            if (height > 0 && weight > 0) {
                var bmi = (weight / (height * height)).toFixed(2);
                document.getElementById('bmi').value = bmi;
            }
        }

        (function() {
            'use strict'
            var forms = document.querySelectorAll('#healthForm');
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
        })();
    </script>

</body>

</html>