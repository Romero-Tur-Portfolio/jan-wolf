<?php

function email_validity( $arg ){
    $output = 'mailto:' . preg_replace('/[^a-zA-Z0-9@._-]/', '', $arg);
    echo $output;
    return $output;
}

function tel_validity( $arg ){
    $output = 'tel:' . preg_replace('/[^0-9+]/', '', $arg);
    echo $output;
    return $output;
}

?>