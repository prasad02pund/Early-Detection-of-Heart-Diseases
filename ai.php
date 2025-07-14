<?php
// Google AI API Key
$api_key = "AIzaSyDO1uXKBMZkE4Wwp9dV0dv2wP9qk4qdB_s";  // Replace with your key

// Gemini API URL
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro:generateContent?key=$api_key";

$response_text = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_input = trim($_POST["user_input"]);

    if (!empty($user_input)) {
        $data = [
            "contents" => [
                ["parts" => [["text" => $user_input]]]
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
        
        // Extract AI response
        if (isset($response['candidates'][0]['content']['parts'][0]['text'])) {
            $response_text = $response['candidates'][0]['content']['parts'][0]['text'];
        } else {
            $response_text = "Error: Unable to get a response.";
        }
    } else {
        $response_text = "Please enter a prompt.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemini AI Chat</title>
</head>
<body>
    <h2>Google Gemini AI Chat</h2>
    <form method="post">
        <input type="text" name="user_input" placeholder="Enter your prompt..." required>
        <button type="submit">Ask AI</button>
    </form>

    <?php if (!empty($response_text)): ?>
        <h3>AI Response:</h3>
        <p><?php echo nl2br(htmlspecialchars($response_text)); ?></p>
    <?php endif; ?>
</body>
</html>
