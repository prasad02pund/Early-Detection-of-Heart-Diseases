


<?php
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=AIzaSyBrUEL8gwaeBzBLjATo-3Qayk5P-6g2kyQ";

$data = [
    "contents" => [
        [
            "parts" => [
                [
                    "text" => "How to prevent heart disease"
                ]
            ]
        ]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    $result = json_decode($response, true);
    $text = $result['candidates'][0]['content']['parts'][0]['text'];
    echo "Gemini says: " . $text;
}

curl_close($ch);
?>
