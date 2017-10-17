<?php
    
    
    $host = "localhost";
    $dbname = "quotes";
    $username = "root";
    $password = "";


    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    function displayReflectionQuotes() {
        global $dbConn;
        
        $sql = "SELECT quote, firstname, lastname 
                FROM `q_quote` 
                NATURAL JOIN q_category 
                NATURAL JOIN q_cat_quote 
                NATURAL JOIN q_author 
                WHERE category = 'Reflection'";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll();

        foreach ($records as $record) {
            echo $record['quote'] . " " . $record['firstName'] . " " . $record['lastName'] . "<br />";
        }
        


        
        
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> SQL Join </title>
    </head>
    <body>


        <?=displayReflectionQuotes()?>


    </body>
</html>