<?php

function message($context, $message){
    $_SESSION['message'] = array(
        "context" => $context,
        "message" => $message
    );
}
