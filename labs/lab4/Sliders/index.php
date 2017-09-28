<?php 
    $backgroundImage = "img/sea.jpg";
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab4</title>
        <meta charset = "utf-8">
        <style>
            @import url(css/styles.css);
            body {
                background-image: url('<?=$backgroundImage?>')
            }
        </style>
    </head>
    <body>
    <?php
    
        if (isset($_GET['keyword'])) {
            include 'api/pixabayAPI.php';
            $imageURLs = getImageURLs($_GET['keyword']);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        }
        
        if(!isset($imageURLs)) {
            echo "<h2>Type a keyword to display a slideshow <br /> width random images from Pixbay.com </h2>";
        }
        
        for ($i = 0; $i < 5; $i++) {
            do {
                $randomIndex = rand(0, count($imageURLs));
            } while (!isset($imageURLs[$randomIndex]));
            
            
             echo "<img src = '" . $imageURLs[$randomIndex] . "' width='200' > ";
             unset($imageURLs[$randomIndex]);
        }
    
    ?>
    
    <form>
        <input type="text" name="keyword" placeholder="Keyword"/>
        <input type="submit" value="Submit"/>
    </form>
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
   
    </body>
</html>