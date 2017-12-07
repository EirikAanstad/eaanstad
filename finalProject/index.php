<?php
include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pokedex</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    </head>
    <body>
    <a href="adminLogin.php" class="btn btn-primary" id="logoutButton">Admin Section!</a>
    <div class="searchContainer">
        <img src="img/logo.png" id="#logo"></img>
        <form onsubmit="return false">  
            <div class="form-group">
                <input type="text" placeholder="search by name" class="form-control" name="keyword" id="keyword"/>
                <label class="radio-inline"><input type="radio" name="optradio" checked value="sortByName">Sort by Name</label>
                <label class="radio-inline"><input type="radio" name="optradio" value="sortByDex">Sort by National №</label>
            </div>
            <div class="form-group">
                <input type="submit" value="Search!" id="search" class="btn btn-primary"/>
            </div>
        </form>
    </div>
    

    <h1 id="ERROR"></h1>
    <div id="mainBody">

    </div> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    </body>
</html>