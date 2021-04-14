<?php

/**
 * Redirect to another URL on the same site
 * 
 * @param string $path - path to redirect to
 * 
 * @return void
 */
function redirect($path){
    //don't use relative paths
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
        $protocol = 'https';
    } else {
        $protocol = 'http';
    }
    //absolUte URL
    header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . $path);
    exit; //sair porque mudamos de pagina

}

?>