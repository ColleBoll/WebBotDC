<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["message"])) {
        $message = $_POST["message"];

        try {
            $json_object = file_get_contents('../botData/commands/test.json');
            $data = json_decode($json_object, true);

            $data[0]['message'] = $message;

            $json_object = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('../botData/commands/test.json', $json_object);

            header("Location: ../panel/testCommand.php");
        } catch (PDOException $e) {
            echo("Error" . $e);
        }
    } else {
        echo "message is niet ingesteld.";
    }
}

?>