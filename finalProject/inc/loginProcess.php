<?php
session_start(); 
include 'functions.php';
$conn = getDatabaseConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']);

        
$sql = "SELECT *
        FROM p_admin
        WHERE username = :username
        AND password = :password";   


$namedParameters  = array();
$namedParameters[':username']  = $username;
$namedParameters[':password']  = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

if (empty($record)) {
    
  header('Location: ../adminLogin.php?loginfail=false');
  exit;
  
} else {
    
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];

   header('Location: ../admin.php'); 
   
}





?>