<?php
session_start();

include './connection.php';

if (isset($_POST['submit'])) {

    $filename = $_FILES["post-image"]["name"];
    $tempname = $_FILES["post-image"]["tmp_name"];
    $folder = "./uploads/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }

    $sql = "SELECT * FROM register WHERE id = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $_SESSION['userID']]);
    $user = $stmt->fetch();

    $sql = "INSERT INTO posts(post_title, category,post_thumbnail, post_desc,author) VALUES (:post_title, :category, :post_thumbnail, :post_desc, :author)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_title' => $_POST['post-title'], 'category' => $_POST['category'], 'post_thumbnail' => $filename, 'post_desc' => $_POST['post-body'], 'author' =>  $user->username]);
    echo 'Successfully added';
    header("Location: community.php");
    exit;
}

?>
