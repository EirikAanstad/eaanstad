<!DOCTYPE html>
<html>
    <head>
        <title>Orc Name Generator</title>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    </head>
    <body>
        <div id ='content'> 
        <h1>Orc Name Generator</h1>
        <?php
            include 'inc/functions.php';
            run();

        ?>
        
        <form>
            <input type="Submit" name="Generate" value="Generate"/>
        </form>
        <div id='Creator'>
            <h3>Created By Eirik</h3>
        </div>
        </div>
        
        <footer>
            <p>CST352 Web Scripting 2017 &copy; Eirik Jerve Aanstad</p>
            <img src="img/Csumb.jpg"></img>
        </footer>
        
    </body>
</html>