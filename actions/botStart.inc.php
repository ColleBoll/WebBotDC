<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot run</title>
</head>
<body>
    <form action="stopBot.inc.php">
        <button id="stopButton">Stop Bot</button>
    </form>

    <?php

        $json_Object = file_get_contents('../botData/config.json');
        $jsonObj = json_decode($json_Object, true);
        $key_token = "token";
        $key_status = "status";

        $token = $jsonObj[0][$key_token];
        $status = $jsonObj[0][$key_status];
        if($token == "" || $status == ""){
            echo("Token or/and status is empty. Make sure you add a value to it.");
        }else{
            exec('npm start --prefix ../botData/', $output, $return_var);

            echo(strval($output . " | Make sure your discord aplication token is valid!"));

            header('Location: ../');
        }

    ?>
</body>
</html>