<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $json_object = file_get_contents('./config.json'); 
    $jsonObj = json_decode($json_object, true);
    $key = "setup";
    $setup = $jsonObj[0][$key];

    if($setup == false){
        header("Location: /");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="../actions/userLogin.inc.php" method="POST">
        <input type="text" name="username" id="username" placeholder="username" required>
        <input type="password" name="password" id="password" placeholder="password" required>
        <button type="submit">login</button>
    </form>
</body>
</html>