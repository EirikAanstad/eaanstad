<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
      <div class="container">
        <h2>Hello World!</h2>
        <div class="form-group">
          <form action="#" method="post">
            <select class = "form-control" name="Color">
              <option value="wb">White</option>
              <option value="br">Blue</option>
              <option value="pg">Pink</option>
              <option value="yb">Yellow</option>
            </select>
            <input class = "btn" type="submit" name="submit" value="Change Color Theme" />
          </form>
          <?php
            if(isset($_POST['submit'])){
              $selected_val = $_POST['Color'];  
              if ($selected_val == 'wb') {
                echo '<body style="background-color:white">';
              } elseif ($selected_val == 'bw') {
                echo '<body style="background-color:black">';
              } elseif ($selected_val == 'br') {
                echo '<body style="background-color:blue">';
              } elseif ($selected_val == 'pg') {
                echo '<body style="background-color:pink">';
              } elseif ($selected_val == 'yb') {
                echo '<body style="background-color:yellow">';
              }
            }
          ?>
        </div>
        <form>
          <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter Name" name="firstname">
          </div>
          <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter name" name="lastname">
          </div>
          <div class="form-group">
          <input type="radio" name="radio" value="backwards" checked = "checked"> Backwards
          <input type="radio" name="radio" value="scrambled"> scrambled
          </div>
          <div = "form-group">
          <input type="radio" name="case" value="uppercase"> Uppercase
          <input type="radio" name="case" value="lowercase"> Lowercase
          </div>
          <button type="submit" class="btn">submit</button>
        </form>
        <?php
        
          if (!isset($_GET["firstname"]) || !isset($_GET["lastname"])) { //is there any parameter called "keyword" in the URL
            echo "<h2>Please enter your name!</h2>";
          } else {
        
          if (empty($_GET["firstname"]) || empty($_GET["lastname"])) { 
            echo "<h2>Please fill out all forms</h2>";
            return;
            exit;
          } 
        
          $name = $_GET["firstname"] . ' ' . $_GET["lastname"];
        
        
          $case = $_GET["case"];
        
        
        
          if ($case == "uppercase") {
            $name = strtoupper($name);
          } elseif ($case == "lowercase") {
            $name = strtolower($name);
          }
        
          $radioVal = $_GET["radio"];
            if ($radioVal == 'backwards') {
            $name = strrev($name);
          } elseif ($radioVal == 'scrambled') {
            $name = str_shuffle($name);
          }
          
          echo "<div = 'result'>";        
          echo "<h1> $name </h1>";
          echo "</div>";
        }
        ?>
      </div>
      <footer>
          <hr>
          <p>CST352 Web Scripting 2017 &copy; Eirik Jerve Aanstad </p>
          <img src="img/Csumb.jpg"></img>
      </footer>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>