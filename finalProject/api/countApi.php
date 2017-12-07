<?php

include '../inc/functions.php';
$conn = getDatabaseConnection();


$sql = "SELECT COUNT(pokemonId) as total FROM `p_pokemon` WHERE 1";
        
$stmt = $conn -> prepare ($sql);
$stmt -> execute();
$record = $stmt -> fetch(PDO::FETCH_ASSOC);


echo json_encode($record);


?>