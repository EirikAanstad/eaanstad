<!DOCTYPE html>
<html>
    <head>
        <title> Lab 7: Admin Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>


        
        <div class="loginForm">
            <form method="POST" action="loginProcess.php">
                <div class="form-group">
                    <label for="username">Username:</label> <br />
                    <input class="form-control"  type="text" name="username" placeholder = "Enter Username" /> 
                </div>
                <div class="form-group">
                    <label for="password">Password:</label> <br />
                    <input class="form-control" type="password" name="password" placeholder = "Enter Password"/> 
                </div>
                <div class="form-group">
                    <input type="submit" value="Login!" name="loginForm" class="btn btn-primary"/>
                </div>    
            </form>
        </di>
    </body>
</html>

<?php

if($_GET['loginfail'] == "false") {
    echo '<h3>Wrong Credencials!</h3>';
}

?>