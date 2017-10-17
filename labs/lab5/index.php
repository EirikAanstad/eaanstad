<?php

include '../../dbConnection.php';

$dbConn = getDatabaseConnection();


//This works but it's very time consuming. Not efficient.
function getRandomQuote_NotEfficient() {
    
    global $dbConn;
    
    $sql = "SELECT quote FROM q_quote ";
    
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();  //retrieves all records;
    
    shuffle($records);
    
    echo $records[0]['quote'];
    //print_r($records);

}


function getRandomQuote() {
    
    global $dbConn;
    
    
    //Retrieve all quote Ids
    //Select one quoteId randomly
    //Get the quote for that quoteId
    
    //Step 1: Generating a random quoteId

    $sql = "SELECT quoteId FROM q_quote";  //retrieves all quoteIds
    
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();  //retrieves all records;
    
    //$records = array (1, 5, 7, 10,  15);
    
    //$randomIndex = rand(0, count($records)-1 );
    $randomIndex = array_rand($records);
    
    //echo($records[$randomIndex]['quoteId']);
    $quoteId = $records[$randomIndex]['quoteId'];
    
    //Step 2: Retreiving quote based on Random Quote Id
    $sql = "SELECT quote, firstName, lastName, authorId 
            FROM q_quote 
            NATURAL JOIN q_author
            WHERE quoteId = $quoteId";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt -> fetch(); //using "fetch()" because it's expected to get ONLY ONE record        
    
    echo  "<em>" . $record['quote']  . "</em><br />";
    echo "<a target='authorInfo' href='getAuthorInfo.php?authorId=".$record['authorId']."'>-" . $record['firstName'] . " " . $record['lastName'] . "</a>";
    
    //print_r($records);

}

$name = $record['firstName'] . " " . $record['lastName'];


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote Generator </title>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body class = "mainBody">
        <div class="container">
            <div class = "quote">
                <?=getRandomQuote()?>
            </div>
            <form>
                <input type="submit" name="get" value="Get Quote"/>
            </form>
            <div class = "infoContainer">
                <iframe class ="authorInfo" name = "authorInfo"></iframe>
            </div>
        </div>
    </body>
</html>





