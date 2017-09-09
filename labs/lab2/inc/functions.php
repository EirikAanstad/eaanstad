<?php
        function displaySymbol($randomNumber, $pos){
            switch ($randomNumber) {
                case 0: $symbol = "seven";
                        break;
                case 1: $symbol = "lemon";
                        break;
                case 2: $symbol = "cherry";
                        break;
                case 3: $symbol = "bar";
                        break;
            }
            echo "<img id='reel$pos' src='img/$symbol.png' alt = '$symbol' title = '". ucfirst($symbol) ."'  width='70px'/>";
           
        }
        
        function score($rand1, $rand2, $rand3) {
            
            echo "<div id = 'output'>";
            if ($rand1 == $rand2 && $rand2 == $rand3) {
                switch ($rand1) {
                    case 0: $points = 1000;
                            echo "<h1>JACKPOT!</h1>";
                            break;
                    case 1: $points = 500;
                            break;
                    case 2: $points = 250;
                            break;
                    case 3: $points = 900;
                            break;
                }
                
                echo "<h2>You Won $points points!</h2>";
            }
            else {
                echo '<h3>Try again</h3>';
            }
                   echo "</div>";
        } 
 
        
        function play() {
            for ($i = 1; $i <= 3; $i++){
                ${"randomValue" . $i}= rand(0, 3);
                displaySymbol(${"randomValue" . $i}, $i);        
            }
            score($randomValue1,$randomValue2, $randomValue3);
           
        }
        
?>