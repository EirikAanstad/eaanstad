<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has already logged in
    header("Location: adminLogin.php");
    exit;
}

include 'functions.php';
$conn = getDatabaseConnection();

$sql = "DELETE FROM p_pokemon WHERE pokemonId = " . $_GET['pokemonId'];

$stmt = $conn->prepare($sql);
$stmt->execute();

$sql = "DELETE FROM p_pokemonType WHERE pokemonId = " . $_GET['pokemonId'];

$stmt = $conn->prepare($sql);
$stmt->execute();

header('Location: ../admin.php');


?>