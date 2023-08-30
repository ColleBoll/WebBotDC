<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot run</title>
</head>
<body>
    <form action="stopBot.php">
        <button id="stopButton">Stop Bot</button>
    </form>

    <?php

        exec('npm start --prefix botData/', $output, $return_var);

        echo($output);

    ?>
</body>
</html>