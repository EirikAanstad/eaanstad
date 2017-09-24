<?php
    include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3: Ace Poker </title>
         <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
    <div is = 'main'>
    <h1>Ace Poker</h1>
    <h2>Player with more aces wins all points</h2>
    <?php
    $player1Aces = displayHand();
    ?>
    <br>
    <?php
    $player2Aces = displayHand();
    ?>
    
    <h2>
    <?=identifyWinner($player1Aces,$player2Aces)?>
    
    Wins:
    <?=$totalPoints?> points!
    </h2>
    </div>
    </body>
</html>