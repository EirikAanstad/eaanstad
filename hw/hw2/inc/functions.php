<?php
    
           
            $fullName;
            
            function background($rand) {
                switch ($rand) {
                    case '1': $background = "Nagrand";
                    break;
                    case '2': $background = "Thrall";
                    break;
                    case '3': $background = "Shadowmoon";
                    break;
                }
                echo "<body background='img/$background.jpg'>";            
                
            }
            
            function displayRunes($rand) {
                switch ($rand) {
                    case 1: $symbol = "1";
                        break;
                    case 2: $symbol = "2";
                        break;
                    case 3: $symbol = "3";
                        break;
                    case 4: $symbol = "4";
                        break;
                    case 5: $symbol = "5";
                        break;
                    case 6: $symbol = "6";
                        break;
                }
            echo "<img src='img/$symbol.png' alt = 'Rune$symbol' title = '". ucfirst($symbol) ."'  width='30px'/>";
           
            }
            
            
            
            function generateName($array1, $array2, $randomNumber1, $randomNumber2) {
                global $fullName;
                $fullName = $array1[$randomNumber1] . ' ' . $array2[$randomNumber2];
                echo "<h3>Your name is $fullName</h3>";
                $nameMeaning;
                switch ($array2[$randomNumber2]) { 
                    case "Wolfsbane": $nameMeaning = "Wolf";
                        break;
                    case "Kingslayer": $nameMeaning = "King";
                        break;
                    case "Liontamer": $nameMeaning = "Lion";
                        break;
                    case "Ogreslayer": $nameMeaning = "Ogre";
                        break;
                    case "Giantslayer": $nameMeaning = "Giant";
                        break;
                    case "Orchunter": $nameMeaning = "Orc";
                        break;
                    case "Bullfighter": $nameMeaning = "Bull";
                        break;
                    case "Beartackler": $nameMeaning = "Bear";
                        break;

                        
                }
                
                
                echo "<img id='nameMeaning' src='img/$nameMeaning.png' alt = '$nameMeaning' title = '$nameMeaning'/>";
                
                
            }
            
            function run(){
                for($i = 0; $i < 6 ; $i++) {
                    $rand = rand(1, 6);
                    displayRunes($rand);
                }
                for($i = 0; $i < 3; $i++) {
                    $rand = rand(1, 3);
                    background($rand);
                }
                $firstName = array("Fenros", "Rashgut", "Moknath", "Kirek", "Mashkar", "Lokath", "Kingosh", "Gromrosh", "Lokhar", "Logash", "Mar'gok");
                $lastName = array( "Wolfsbane", "Liontamer", "Ogreslayer", "Orchunter", "Kingslayer", "Bullfighter", "Giantslayer", "Beartackler");
                $randomNumber1 = rand(0, 10);
                $randomNumber2 = rand (0, 7);
                generateName($firstName, $lastName, $randomNumber1, $randomNumber2);
                
                
            }
            
            


?>