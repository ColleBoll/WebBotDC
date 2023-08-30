<?php

    try {
        exec('killall node');

        header('Location: /');
    } catch (\Throwable $th) {
        echo($th);
    }

?>