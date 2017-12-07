<?php

include '../inc/functions.php';
$conn = getDatabaseConnection();


$sql = "SELECT COUNT(generation) as generationCount, generation FROM p_pokemon 
        GROUP BY generation 
        ORDER BY generationCount DESC LIMIT 1;";
        
$stmt = $conn -> prepare ($sql);
$stmt -> execute();
$record = $stmt -> fetch(PDO::FETCH_ASSOC);


echo json_encode($record);


?>