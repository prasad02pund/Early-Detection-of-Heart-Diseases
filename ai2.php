<?php
// Google AI API Key
$api_key = "AIzaSyAdT_gax0gMcAFzJaReBeG5ZKLBWrnEigA";  // Replace with your key

// Gemini API URL
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro:generateContent?key=$api_key";

$response_age = "";
$response_bmi = "";
$response_chestpain = "";
$response_bp = "";
$response_heartrate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Health parameters
    $age = "56";
    $bmi = "35";
    $chestpain = "ATA";
    $blood_pressure = "180";
    $heart_rate = "90";

    // Construct prompts

    $prompt_age = "Age: $age\n";
    $prompt_age .= "Talk about age in heart related issues. If age is old then suggest to take care in 30 words only.";

    $prompt_bmi = "BMI: $bmi\n";
    $prompt_bmi .= "Talk about bmi in heart related issues. Tell how to control it if its normal tell how maintain same about 40 words.";

    $prompt_chestpain = "Age: $chestpain\n";
    $prompt_chestpain .= "Talk about chestpain feel to the user in heart related issues. Talk about how to control it or any other suggestions and if no pain then only give general about how to maintain it in 50 words only.";

    $prompt_bp = "Blood Pressure: $blood_pressure\n";
    $prompt_bp .= "Provide suggestions on how to improve, what to avoid, and what should be followed to normalize it. Focus on natural methods like diet, specific foods rich in beneficial nutrients, and lifestyle changes. Avoid mentioning consulting a doctor. Keep the response around 50 words in simple language.";

    $prompt_heartrate = "Heart Rate: $heart_rate\n";
    $prompt_heartrate .= "Provide suggestions on how to control, improve, or maintain a healthy heart rate. Focus on natural lifestyle changes, exercises, and healthy food choices. Avoid mentioning consulting a doctor. Keep the response around 50 words in simple language.";

    $prompts = [$prompt_age, $prompt_bmi, $prompt_chestpain, $prompt_bp, $prompt_heartrate];
    $responses = [&$response_age, &$response_bmi, &$response_chestpain,  &$response_bp, &$response_heartrate];

    foreach ($prompts as $index => $prompt) {
        $data = [
            "contents" => [
                ["parts" => [["text" => $prompt]]]
            ]
        ];

        $json_data = json_encode($data);

        // cURL request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result, true);

        if (isset($response['candidates'][0]['content']['parts'][0]['text'])) {
            $responses[$index] = $response['candidates'][0]['content']['parts'][0]['text'];
        } else {
            $responses[$index] = "Error: Unable to get a response.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health AI Suggestions</title>
</head>

<body>
    <h2>Health Suggestions</h2>
    <form method="post">
        <button type="submit">Get Suggestions</button>
    </form>

    <?php if (!empty($response_age)): ?>
        <h3>Age</h3>
        <p><?php echo nl2br(htmlspecialchars($response_age)); ?></p>
    <?php endif; ?>

    <?php if (!empty($response_bmi)): ?>
        <h3>BMI</h3>
        <p><?php echo nl2br(htmlspecialchars($response_bmi)); ?></p>
    <?php endif; ?>

    <?php if (!empty($response_chestpain)): ?>
        <h3>Chestpain</h3>
        <p><?php echo nl2br(htmlspecialchars($response_chestpain)); ?></p>
    <?php endif; ?>

    <?php if (!empty($response_bp)): ?>
        <h3>Blood Pressure Suggestion</h3>
        <p><?php echo nl2br(htmlspecialchars($response_bp)); ?></p>
    <?php endif; ?>

    <?php if (!empty($response_heartrate)): ?>
        <h3>Heart Rate Suggestion</h3>
        <p><?php echo nl2br(htmlspecialchars($response_heartrate)); ?></p>
    <?php endif; ?>

</body>

</html>