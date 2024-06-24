<?php
//    We must comment out these codes in order to demonstrate the CSRF Attack.
//    Explicitly setting the value of 'samesite' to 'Lax' or 'Strict' prevents all POST requests from cross-site.
//    By default, Chrome relaxes these restrictions for the  first 2 min after the session established,
//    which means accepting POST requests from cross-site for the first 2 min.
//    Removing the comment out leads to the failure of the CSRF Attack.
//    session_set_cookie_params([
//      'lifetime' => 0,
//      'path' => '/',
//      'domain' => '',
//      'secure' => false,
//      'httponly' => false,
//      'samesite' => 'Strict'
//    ]);
    session_start();
    const DB_DSN = 'mysql:dbname=csrf;host=localhost';
    // Set username and password for db
    const DB_USERNAME = '';
    const DB_PASSWORD = '';


    function conn(){
        try {
                $pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                return $pdo;
        } catch (PDOException $e) {
                echo 'connection failed';
        }
    }


    function login(){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $pdo = conn();
          $sql = "select * from users where username = :username and password = :password";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array("username"=>$username,"password"=>$password));
          $user = $stmt->fetch();
//        var_dump($user);
          if ($user) {
              $_SESSION['username'] = $user['username'];
//            var_dump($_SESSION['username']);
              header("Location: ./welcome.php");
              exit();
          } else {
              echo "Authentication Failed";
          }
    }

    function savePost($username){
        $comment = $_POST['comment'];
        $pdo = conn();
        $sql = "insert into comments(username,comment) values(:username, :comment)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array("username"=>$username,"comment"=>$comment));
        header("Location: ./welcome.php");
        exit();
    }


    function getPost(){
        $pdo = conn();
        $sql = "select * from comments";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll();
        return $posts;
    }
