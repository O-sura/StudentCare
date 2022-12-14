<?php

    include 'connection.php';
    session_start();
    if(!isset($_SESSION['userID'])){
        header("Location: home.php");
        exit();
    }

    $userID = $_SESSION['userID'];

    $sql = "SELECT * FROM posts ORDER BY post_id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([]);
    $posts = $stmt->fetchAll();

    $sql = "SELECT * FROM register WHERE id= :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $userID]);
    $user = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/community.css">
</head>
<body>
    <!-- This includes the sidebar and the opening tag to home-content -->
    <?php include 'sidebar.php'?>
    
    <!-- Below here should be the content for homepage -->

    <div class="content-section">
            <div class="upper-row">
                <input type="search" name="search" id="searchbar" placeholder="Search Here">
                <div class="post-category">
                    <?php include 'dropdown.php'?>
                </div>
            </div>
            <div class="secondary-row">
            <div class="filters">
                <div class="best-filter">
                    <span class="best-filter"><i class="fa-solid fa-rocket" id="best"></i></span>
                    <h5 class="button-text">Best</h5>
                </div>
                <div class="latest-filter">
                    <span class="latest-filter"><i class="fa-solid fa-clock" class="latest"></i></span>
                    <h5 class="button-text">Latest</h5>
                </div>
            </div>
            <a href="community-postAdd.php"><button type="submit" class="addNew-button"><i class="fa-solid fa-circle-plus"></i><p>Add New</p></button></a>
            </div>
            <hr/>
            
            <?php foreach ($posts as $post): ?>
            <div class="parent">
                    <div class="icon-text-button">
                        <button class="icon-btn" id="up"><i class="fa-solid fa-up-long"></i></button>
                        <p id="vote-count">16</p>
                        <button class="icon-btn" id="down"><i class="fa-solid fa-down-long"></i></button>
                    </div>
                    <div class="div1">
                        <img src="./uploads/<?= $post->{'post_thumbnail'} ?>" alt="thumbnail" class="thumbnail">
                    </div>
                    <div class="div2">
                        <div class="top">
                            <h1><?= $post->{'post_title'} ?></h1>
                            <?php if($post->author === $user->username) : ?>
                                <?php echo '<div class="buttons">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <i class="fa-solid fa-trash"></i>
                                </div>'?>
                            <?php endif;?>
                        </div>
                        <div class="meta-data">
                            <h4>By: <?= $post->{'author'} ?></h4>
                            <h4><?= explode(" ", $post->{'posted_at'})[0] ?></h4>
                            <h4>Category: <?= $post->{'category'} ?></h4>
                        </div>
                        <div class="content">
                            <?= $post->{'post_desc'} ?>
                        </div>
                        <div class="options">
                            <input type="button" value="Read More" class="button">
                            <div class="bottom">
                                <div class="option">
                                    <i class="fa-regular fa-bookmark"></i>
                                    <span>Save</span>
                                </div>
                                <div class="option">
                                    <i class="fa-solid fa-flag"></i>
                                    <span>Report</span>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <?php endforeach ?>
    <!-- Above here should be the content for homepage -->
</div>
  
<script>
    const upvote = document.getElementById('up');
    const downvote = document.getElementById('down');

    upvote.addEventListener('click', increaseCount);
    downvote.addEventListener('click', decreaseCount);

    function increaseCount(){
        let votes = parseInt(document.getElementById('vote-count').textContent);
        votes += 1;
        const tmp = votes.toString();
        document.getElementById('vote-count').innerHTML = tmp;
    }

    
    function decreaseCount(){
        let votes = parseInt(document.getElementById('vote-count').textContent);
        votes -= 1;
        const tmp = votes.toString();
        document.getElementById('vote-count').innerHTML = tmp;
    }

    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function(){
        sidebar.classList.toggle("active");
    }

    const add_new = document.getElementsByClassName('addNew-button')[0];
    add_new.addEventListener('click', newPage);

    function newPage(){
        window.location.replace("community-postAdd.php");
    }
</script>

</body>
</html>