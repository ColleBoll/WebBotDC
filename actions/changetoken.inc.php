<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["token"])) {
        $token = $_POST["token"];

        try {
            $json_object = file_get_contents('../botData/config.json');
            $data = json_decode($json_object, true);

            $data[0]['token'] = $token;

            $json_object = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('../botData/config.json', $json_object);

            header("Location: ../");
        } catch (PDOException $e) {
            echo("Error" . $e);
        }
    } else {
        echo "Token is niet ingesteld.";
    }
}
?>