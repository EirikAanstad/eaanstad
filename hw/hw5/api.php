<?php
session_start();
include '../../dbConnection.php';
$conn = getDatabaseConnection();




$insertSql = "INSERT INTO `q_quizScore` (`userId`, `score`) 
        VALUES (:userId, :score);";   

$np = array();
$np[":score"]  = $_GET['score'];
$np[":userId"] = $_SESSION[userId];


$stmt = $conn->prepare($insertSql);
$stmt->execute($np);


$avgCountSql = "SELECT AVG(score) AS avg, COUNT(scoreId) AS count
            FROM q_quizScore
            WHERE userId = :userId";

        
$stmt = $conn -> prepare ($avgCountSql);
$stmt -> execute( array(":userId"=>$_SESSION[userId]) );
$record = $stmt -> fetch(PDO::FETCH_ASSOC);

echo json_encode($record);
?>