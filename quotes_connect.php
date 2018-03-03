<?php

try
{
    $dbc = mysqli_connect("127.0.0.1", "quote_user",
        'supersecretpassword', "quotes");
} catch (Exception $ex) {
    echo 'Bad things just happened';
}