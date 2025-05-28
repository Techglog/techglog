<?php
// Database connection
$host = "localhost"; // Replace with your database host
$dbname = "techglo1_addup";
$username = "techglo1_addup";
$password = "techglo1_addup";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the POST body sent by Paystack
    $input = @file_get_contents("php://input");
    $event = json_decode($input, true);

    // Log the event for debugging (optional)
    file_put_contents("paystack_event.log", $input . PHP_EOL, FILE_APPEND);

    // Verify the signature to confirm it's from Paystack
    $paystack_secret_key = "sk_live_dac7d0ed0326ef3f80d0e7955f6c18f298a1fbc8";
    $signature = $_SERVER['HTTP_X_PAYSTACK_SIGNATURE'];

    if (hash_hmac('sha512', $input, $paystack_secret_key) === $signature) {
        if ($event['event'] == 'charge.success') {
            // Extract transaction details
            $reference = $event['data']['reference'];
            $amount = $event['data']['amount'] / 100; // Convert from kobo to Naira
            $status = $event['data']['status'];
            $email = $event['data']['customer']['email'];
            $user_id = $event['data']['metadata']['user_id']; // Assuming you pass user_id in metadata

            // Check if payment already exists
            $stmt = $pdo->prepare("SELECT * FROM payments WHERE reference = ?");
            $stmt->execute([$reference]);
            if ($stmt->rowCount() === 0) {
                // Insert payment into the database
                $stmt = $pdo->prepare("INSERT INTO payments (user_id, reference, amount, status, email) 
                                       VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$user_id, $reference, $amount, $status, $email]);

                file_put_contents("paystack_event.log", "Payment processed: $reference" . PHP_EOL, FILE_APPEND);
            }
        }
        http_response_code(200); // Acknowledge the webhook
    } else {
        http_response_code(400); // Invalid signature
        file_put_contents("paystack_event.log", "Invalid signature" . PHP_EOL, FILE_APPEND);
    }
} catch (PDOException $e) {
    file_put_contents("paystack_event.log", "Database error: " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    http_response_code(500); // Server error
}
?>
