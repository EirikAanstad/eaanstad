<?php
session_start();
if (!isset($_SESSION['username'])) { 
    
    header("Location: adminLogin.php"); 
    exit;
}
include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section  </title>
        <meta charset="utf-8">
        <link rel="icon" href="img/Pikachu_Sprite.gif"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    </head>
    <body>
        <div class = "adminPanel">
            <h1> ADMIN SECTION</h1>
            <h2> Welcome <?=$_SESSION[adminFullName]?>!</h2> 
            <form onsubmit='return false'>
            <?php 
            
            $pokemon = displayPokemon();
            echo "<table class='table table-striped'>";
            echo "<tr><th>Pokedex Id</th><th>Name</th><th>Japanese Name</th><th>Generation</th>
            <th>Primary Type</th><th>Secondary Type</th><th>Update Entry</th><th>Delete Entry</th></tr>";
            
            foreach($pokemon as $poke) {
                echo "<tr><td>" . $poke['dexId'] . "</td><td>" . $poke['name'] . "</td>
                <td>" . $poke['jName'] . "</td><td>" . $poke['generation'] . "</td>
                <td>" . $poke['PrimaryType'] . "</td><td>" . $poke['SecondaryType'] . "</td>
                <td><a class='btn btn-primary' role='button' href='updatePokemon.php?pokemonId=".$poke['pokeId']."'>Update</a></td>
                <td><a onclick='return confirmAction()' class='btn btn-primary' role='button' href='inc/deletePokemon.php?pokemonId=".$poke['pokeId']."'>Delete</a></td></tr>";
            }
            echo "</table>";
            
            ?>
            <div class="form-group">
                <a class="btn btn-primary" href="addPokemon.php">Add a new entry</a>
            </div>
            
            <input class="btn btn-primary" id="showTotal" type="submit" value="Show entry count"/>
            <input class="btn btn-primary" id="showMostFrequentGen" type="submit" value="Show most frequent generation"/>
            <h3 id="agg"></h3>
        </form>
        </div>
        
        
        <a href="inc/logout.php" class="btn btn-primary" id="logoutButton">Logout!</a>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
    </body>
</html>
