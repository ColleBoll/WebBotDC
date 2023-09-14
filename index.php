<?php

    $json_object = file_get_contents('./config.json'); 
    $jsonObj = json_decode($json_object, true);
    $key = "setup";
    $setup = $jsonObj[0][$key];

    if($setup == true){
        header("Location: /panel");
    }else{
        header("Location: setup");
    }

?>