<?php

function showMessage($name = 'Bob'){
  return "Hello $name \n";
}

$message = showMessage('Dave');
showMessage();
echo $message;


function getMessage2($morning) {
    if ($morning) {
        return "Good morning";
    } else {
        return "Good afternoon";
    }
}

$message = getMessage2(false);
echo $message;


 ?>
