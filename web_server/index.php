<?php
    require_once("./conn.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        login();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form action="" method="POST">
        <p>username:<input type="text" name="username">
        <p>password:<input type="password" name="password">
        <br>
        <button type="submit">LOGIN</button> 
    </form>
</body>
</html>

