<?php
// Get database connection
$dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '');

$senderId = 1001; // Change this to the ID of the sender user
$receiverId = 1002; // Change this to the ID of the receiver user

// Fetch new messages from database
$stmt = $dbh->prepare('SELECT * FROM messages WHERE isRead=0 AND ((senderID = :senderId_1 AND receiverID = :receiverId_1) OR (senderID = :senderId_2 AND receiverID = :receiverId_2))');
$stmt->bindParam(':senderId_1', $senderId);
$stmt->bindParam(':receiverId_1', $receiverId);
$stmt->bindParam(':senderId_2', $receiverId);
$stmt->bindParam(':receiverId_2', $senderId);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Loop through the selected records and update isRead to 1
foreach ($messages as $message) {
    $updateStmt = $dbh->prepare('UPDATE messages SET isRead = 1 WHERE messageID = :messageID');
    $updateStmt->bindParam(':messageID', $message['messageID']);
    $updateStmt->execute();
}

//Return JSON response with new messages
header('Content-Type: application/json');
echo json_encode($messages);


?>

