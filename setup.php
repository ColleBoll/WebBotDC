<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $json_object = file_get_contents('./config.json'); 
    $jsonObj = json_decode($json_object, true);
    $key = "setup";
    $setup = $jsonObj[0][$key];

    if(!($setup == false)){
        header("Location: /");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Panel</title>
</head>
<body>
    <h1>Setup Panel</h1>
    <form action="actions/setupDataInput.inc.php" method="POST">
        <div class="account">
            <h3>user account</h3>
            <input type="text" name="username" id="username" placeholder="username" required>
            <input type="email" name="email" id="email" placeholder="email" required>
            <input type="password" name="password" id="password" placeholder="password" required>
        </div>
        <div class="database">
            <h3>database</h3>
            <input type="text" name="dbname" id="dbname" placeholder="database name" required>
            <input type="text" name="dbhost" id="dbhost" placeholder="host (default: localhost)" required>
            <input type="text" name="dbusername" id="dbusername" placeholder="username" required>
            <input type="password" name="dbuserpassword" id="dbuserpassword" placeholder="password of user" required>
        </div>
        <button type="submit">Setup</button>
    </form>
</body>
</html>