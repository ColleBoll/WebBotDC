<?php

    $json_object = file_get_contents('./config.json'); 
    $jsonObj = json_decode($json_object, true);
    $key = "setup";
    $setup = $jsonObj[0][$key];

    if($setup == true){
        if(isset($_SESSION['username']) && isset($_SESSION['email'])){
            header("Location: /panel");
            exit;
        }else{
            header("Location: login");
            exit;
        }
    }else{
        header("Location: setup");
    }

    echo("When you see this, there went something wrong
    \nLatest ERROR message: " . $_SESSION['error_message']);

?>