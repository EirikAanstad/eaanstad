<?php


$deck = range(1,41);
shuffle($deck);
$totalPoints = 0;

function displayHand() {
    global $deck, $totalPoints;
    $handPoints = 0;
    $handAces = 0;
    
    for ($i = 0 ; $i < 5 ; $i++) {
        $lastCard = array_pop($deck);
        $cardValue = $lastCard % 13;
        $cardSuit;
        if($lastCard <= 13) {
            $cardSuit = "clubs";
        } else if($lastCard > 13 && $lastCard <= 26) {
            $cardSuit = "diamonds";
        } else if($lastCard > 26 && $lastCard <= 39) {
            $cardSuit = "hearts";
        } else if($lastCard > 39) {
            $cardSuit = "spades";
        }
        if($cardValue == 0) {
            $cardValue = 13;
        }
        if ($cardValue == 1) { //identifies an ace
            echo "<img class='ace' src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />";
            $handAces = $handAces + 1;   //another way to do this is using the syntax: $handAces++;
        }
        else {
            echo "<img src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />";
        }
        $handPoints = $handPoints + $cardValue;
    }
    
    echo " Points: " . $handPoints;
    
    echo "  Aces: "  . $handAces;
    
    $totalPoints = $totalPoints + $handPoints;
    
    return $handAces;
    
}



function identifyWinner($p1, $p2) {

     if ( $p1 > $p2) {
        echo "Player 1 ";
    } else if ($p1 < $p2) {
        echo "Player 2 ";
    } else {
        echo "Nobody ";
    }
    
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3: Ace Poker </title>
         <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
    <div id = 'main'>
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