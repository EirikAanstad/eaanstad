<?php

include '../../../dbConnection.php';

$conn = getDatabaseConnection();

$sql = "SELECT * FROM `q_author` WHERE authorId=" . $_GET['authorId'];
$stmt = $conn -> prepare ($sql);
$stmt -> execute();
$record = $stmt -> fetch();

function printInfo() {
    
    global $conn;
        
        $sql = "SELECT * FROM `q_author` WHERE authorId=" . $_GET['authorId'];
        $stmt = $conn -> prepare ($sql);
        $stmt -> execute();
        $record = $stmt -> fetch();
        echo "<h3>" . $record['firstName'] . " " . $record['firstName'] . "</h3>";
        echo "<br />";
        echo $record['dob'];
        echo "<br />";
        echo $record['biography'];
        echo "<br />";
        echo "<img src=".$record['picture']." width = '760px' />";
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Author Info </title>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body = "authorBody">
        <?=printInfo()?>
    </body>
</html>