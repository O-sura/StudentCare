<?php
require 'connection.php';
session_start();
$userID = $_SESSION['userID'];
var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO appointments(counsellor_id, student_id, appointment_desc) VALUES (:counsellor_id, :student_id, :appointment_desc)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['counsellor_id' => $userID, 'student_id' => $_POST['studentID'], 'appointment_desc' => $_POST['desc']]);
    echo 'Successfully added';
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentCare</title>
</head>
<body>
<div class="formContainer">
        <h1>ADD NEW APPOINTMENT</h1>
        <form action="addAppointment.php" method="POST">
            <input class="formInput" placeholder="Enter the Student ID" name="studentID" type="text" value="<?= htmlspecialchars($_POST["studentID"] ?? "") ?>"/>
            <input class="formInput" placeholder="Enter the Student Name" name="studentName" type="text" value="<?= htmlspecialchars($_POST["studentName"] ?? "") ?>"/>
            <input class="formInput" placeholder="Description" name="desc" type="textarea" value="<?= htmlspecialchars($_POST["desc"] ?? "") ?>"/>
            <input type="submit" value="Add" class="formInput button"/>
    </div>
</body>
</html>