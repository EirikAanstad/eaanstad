<!DOCTYPE html>
<html>
    <head>
        <title> Homework 5 </title>
        <link rel="icon" href="img/tardisss.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <body>
        
        
        <div id="loginForm">
            <form method="POST" action="loginProcess.php">
                <div class="form-group">
                    <label for="username">Username:</label> <br />
                    <input class="form-control"  type="text" name="username" placeholder = "Enter Username" /> 
                </div>
                <div class="form-group">
                    <label for="password">Password:</label> <br />
                    <input class="form-control" type="password" name="password" placeholder = "Enter Password"/> 
                </div>
                <div class="form-group" class="buttons">
                    <input type="submit" value="Login!" name="loginForm" class="btn btn-primary"/>
                </div>    
                <?php
                if($_GET['loginfail'] == "false") {
                    echo '<h3 id="errorLogin">Wrong Credencials!</h3>';
                }
                ?>
            </form>
        </div>
        <script type="text/javascript" src="js/functions.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </body>
</html>


