<!DOCTYPE html>
<html>
    <head>
        <title>Random Background Color</title>
        <meta charset = 'utf-8'>
        
        <style type="text/css">
            body {
                <?php 
                echo "background-color: rgba(" . rand(0, 255) . " , " . rand(0, 255) . " , " . rand(0, 255) . ", " . rand(0, 100/100) .");"
                ?>
            }
            
            h1 {
                <?php
                echo "color: rgb(" . rand(0, 255) . " , " . rand(0, 255) . " , " . rand(0, 255) . ");"
                ?>
            }
        </style>
        
    </head>
    <body>
        <h1>Hello World!</h1>
    </body>
</html>