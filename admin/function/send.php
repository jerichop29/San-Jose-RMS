<?php



$text = 'Hi, This is a test message.';

$number = '09353372791';



exec('echo '.$text.' | gnokii --sendsms '.$number); 

?>