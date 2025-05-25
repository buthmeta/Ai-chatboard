<?php
$api_key = "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"; // 🚨 អាចលាក់ key ក្នុង .env បើ Deploy จริง

$user_input = $_POST['message'] ?? '';
if (!$user_input) {
    echo "No message provided.";
    exit;
}

$data = [
    "model" => "openai/gpt-3.5-turbo",
    "messages" => [
        ["role" => "user", "content" => $user_input]
    ]
];

$ch = curl_init('https://openrouter.ai/api/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key,
    'HTTP-Referer: http://localhost',
    'X-Title: MyChatbot',
]);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
    exit;
}
curl_close($ch);

$response_data = json_decode($response, true);
if (isset($response_data['choices'][0]['message']['content'])) {
    echo $response_data['choices'][0]['message']['content'];
} else {
    echo "Something went wrong.";
}
?>
