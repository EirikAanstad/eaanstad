<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/Pikachu_Sprite.gif"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <body>
        
        
        <div class="loginForm">
            <h1 id="loginText">Login</h1>
            <form method="POST" action="inc/loginProcess.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control"  type="text" name="username" placeholder = "Enter Username" /> 
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" placeholder = "Enter Password"/> 
                </div>
                <div class="form-group buttons">
                    <input type="submit" value="Login!" name="loginForm" class="btn btn-primary"/>
                    <a class="btn btn-primary" href="index.php">Back!</a>
                </div>    
                <?php
                if($_GET['loginfail'] == "false") {
                    echo '<h3 id="errorLogin">Wrong Credencials!</h3>';
                }
                ?>
            </form>
        </div>
    </body>
</html>


