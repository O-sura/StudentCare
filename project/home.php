<?php
    //Pick the user from the session variables
    session_start();
    if(isset($_SESSION['userID'])){
        require 'connection.php';

        $userID = $_SESSION['userID'];

        $sql = "SELECT * FROM register WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $userID]);
        $user = $stmt->fetch();

        $query = "SELECT * FROM appointments";
        $stmt1 = $pdo->prepare($query);
        $stmt1->execute([]);
        $appointments = $stmt1->fetchAll();


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
    <?php if (isset($user)): ?>
        <h1>Hi, <?= htmlspecialchars($user['username']) ?></h1>
        <h2>Welcome to the Homepage <a href="logout.php">Log Out</a></h2>
        <hr/>
        <a href="addAppointment.php"><input type="submit" value="Add New Appointment"/></a>
        <table class="appointments">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Student Name</th>
                <th>Description</th>
            </tr>
            <?php
            foreach ($appointments as $app)
            {

                $d = $app['datetime'];
                $dt = new DateTime($d);
                $date = $dt->format('m/d/Y');
                $time = $dt->format('H:i:s');

                echo '<tr>';
                echo "<td>{$date}</td>";
                echo "<td>{$time}</td>";
                echo "<td>{$app['student_id']}</td>";
                echo "<td>{$app['appointment_desc']}</td>";
                echo '</tr>';
            }
            ?>
        </table>
        
    <?php else: ?>
        <span>You are not logged in. <a href="login.php">Login</a> or <a href="register.php">Register</a></span>
    <?php endif;?>
</body>
</html>