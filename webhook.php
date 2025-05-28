<?php
// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event = json_decode($input, true);

// Verify that the request is from Paystack
$secret_key = "sk_live_dac7d0ed0326ef3f80d0e7955f6c18f298a1fbc8"; // Your secret key
$signature = $_SERVER['HTTP_X_PAYSTACK_SIGNATURE'];

if (!$signature) {
    http_response_code(400);
    exit();
}

// Validate signature
if (hash_hmac('sha512', $input, $secret_key) !== $signature) {
    http_response_code(400);
    exit();
}

// Process the event
if ($event['event'] === 'charge.success') {
    // Identify the project using the reference or metadata
    $reference = $event['data']['reference']; // Example: "addup_12345" or "unlimited_67890"

    if (strpos($reference, 'addup_') === 0) {
        // Handle transactions for the "addup" project
        // Example: Save data to "addup" database
        $transaction_id = $event['data']['id'];
        $amount = $event['data']['amount'] / 100;
        $email = $event['data']['customer']['email'];
        // Perform actions specific to "addup"
    } elseif (strpos($reference, 'unlimited_') === 0) {
        // Handle transactions for the "unlimited" project
        // Example: Save data to "unlimited" database
        $transaction_id = $event['data']['id'];
        $amount = $event['data']['amount'] / 100;
        $email = $event['data']['customer']['email'];
        // Perform actions specific to "unlimited"
    }
}

// Acknowledge the event
http_response_code(200);
?>
