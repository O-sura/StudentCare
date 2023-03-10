<?php

$data = json_decode(file_get_contents('php://input'), true);

// Get database connection
$dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '');

// Get message data from form data
$message = $data['messageBody'];
$senderId = 1001; // Change this to the ID of the sender user
$receiverId = 1002; // Change this to the ID of the receiver user
$timestamp = date('Y-m-d H:i:s');
$isRead = false;


// Insert message into database
$stmt = $dbh->prepare('INSERT INTO messages (senderID, receiverID, message, received_at) VALUES (:sender_id, :receiver_id, :message, :received_at)');
$stmt->bindParam(':sender_id', $senderId);
$stmt->bindParam(':receiver_id', $receiverId);
$stmt->bindParam(':message', $message);
$stmt->bindParam(':received_at', $timestamp);

if($stmt->execute()){
  $status = 'success';
}else{
  $status = 'failed';
}

// Return JSON response with message ID and timestamp
$response = [
  'message' => $message,
  'status' => $status,
  'received_at' => $timestamp
];
header('Content-Type: application/json');
echo json_encode($response);

?>
