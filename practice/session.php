<?php

session_start();

if(!isset($_SESSION['randomNumber'])) {
    $_SESSION['randomNumber'] = rand(1,100);
}

$randomNumber = rand(1,100);

echo "number to guess: " .  $_SESSION['randomNumber'];

?>




<!DOCTYPE html>
<html>
    <head>
        <title>Guess a number </title>
    </head>
    <body>
        
        <h1> Guess a number from 1 to 100 </h1>
        
        
        <form>
            <input type="text" name="guess"/>
            <input type="submit" name="submit"/>
    
        </form>

    </body>
</html>