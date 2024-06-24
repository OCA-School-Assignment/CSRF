<?php
    require_once("conn.php");
    if (!isset($_SESSION['username'])) {
        header("Location: ./403.html");
        exit();
    }
    $posts = getPost();
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_SESSION['username'];
        savePost($username);
    }
    // Debug for Referer check
    //error_log("Session ID:" . session_id());
    //error_log("POST Request" . print_r($_POST, true));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME PAGE</title>
</head>
<body>
    <h1>Welcome, <?=$_SESSION['username']?></h1>
    <a href="./logout.php">LOGOUT</a>
    <form action="" method="POST">
        <input type="text" name="comment">
        <button type="submit">POST</button>
    </form>
    <p>--------------------</p>
    <?php foreach($posts as $post): ?>
    <p><?=$post['username']?></p>
    <p><?=$post['comments']?></p>
    <p>--------------------</p>
    <?php endforeach; ?>
</body>
</html>
