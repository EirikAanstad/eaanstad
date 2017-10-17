<!DOCTYPE html>
<html>
    <head>
        <title>cards</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        <div id = "main">
        <?php
            
            
            
        $card;
        function displayCard($randomNumber, $pos){
            switch ($randomNumber) {
                case 0: $card = "ten";
                        break;
                case 1: $card = "jack";
                        break;
                case 2: $card = "queen";
                        break;
                case 3: $card = "king";
                        break;
                case 4: $card = "ace";
                        break;
            }
            if ($pos == 1) {
             echo "<h1> Computer </h1>";   
            } else if ($pos == 2) {
             echo "<h1> Player </h1>";   
            }
            echo "<img id = 'card$pos' src='img/$card.png' alt = '$card' title = '". ucfirst($card) ."'/>";
           
        }
        
        function compareScore($rand1, $rand2){
            if($rand1 == $rand2){
                echo '<h3>TIE</h3>';
            } else if ($rand1 > $rand2) {
                echo '<h3>Player Wins</h3>';
            } else if ($rand1 < $rand2) {
                echo '<h3>Computer Wins</h3>';
            }
            
            
        }

        
        for ($i = 1; $i < 3; $i++){
            ${"rand" . $i}= rand(0, 4);
            displayCard(${"rand" . $i}, $i);        
        }
        
        compareScore($rand1, $rand2);
        
        
        
        ?>
        </div>
    </body>
</html>