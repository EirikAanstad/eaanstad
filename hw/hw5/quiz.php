<?php
session_start();

if (!isset($_SESSION['username'])) { 
    
    header("Location: index.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Homework 5 </title>
        <link rel="icon" href="img/tardisss.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <body>
        <h1> Welcome <?=$_SESSION[adminFullName]?>!</h1>    
        <h1>Doctor Who Quiz</h1>
        <div id="quiz">
            <div class = "form-group">
                <label for="question1">1. In the TV show Doctor who, how many doctors have there been so far</label> 
                <img src="img/correct.png" id="correct1" style="display: none;"></img>
                <img src="img/wrong.png" id="wrong1" style="display: none;"></img>
                <br />
                <input type="text" id="question1"/>
                <p id="rightAnswer1"></p>
            </div>
            <br />
            
            <div class="form-group">
                <label for="question2">2. Who is the most recent actor To play The doctor?</label>  
                <img src="img/correct.png" id="correct2" style="display: none;"></img>
                <img src="img/wrong.png" id="wrong2" style="display: none;"></img>
                <br />
                <input type="text" id="question2"/>
                <p id="rightAnswer2"></p>
            </div>
            <br />
            
            <div class="form-group">
                <label for="question3">2. What is the name of Claras boyfriend?</label>    
                <img src="img/correct.png" id="correct3" style="display: none;"></img>
                <img src="img/wrong.png" id="wrong3" style="display: none;"></img>
                <br />
                <select id="question3">
                    <option>Select One</option>
                    <option value="dannyPink">Danny Pink</option>
                    <option value="eirikAanstad">Eirik Aanstad</option>
                    <option value="mattStone">Matt Stone</option>
                    <option value="giantEnemyCrabgot">Giant Enemy Crabgot</option>
                </select>
                <p id="rightAnswer3"></p>
            </div> 
            <br />
            
            <div class = "form-group">
                <label for="question4">4. Which of the following creatures are not in Doctor Who?</label>
                <img src="img/correct.png" id="correct4" style="display: none;"></img>
                <img src="img/wrong.png" id="wrong4" style="display: none;"></img>
                <br />
                <input type="radio" name="question4" value="dalek"> Dalek<br>
                <input type="radio" name="question4" value="cybermen"> Cybermen<br>
                <input type="radio" name="question4" value="arrakoa"> Arrakoa<br>
                <input type="radio" name="question4" value="iceWarrior"> Ice Warrior<br>
                <input type="radio" name="question4" value="abzorbaloff"> Abzorbaloff
                <p id="rightAnswer4"></p>
            </div>
            <br />
            
            <div class = "form-group">
                <label for="question5">5. What was the name of the 9th doctors female companion?</label>
                <img src="img/correct.png" id="correct5" style="display: none;"></img>
                <img src="img/wrong.png" id="wrong5" style="display: none;"></img>
                <br />
                <input type="text" id="question5"/>
                <p id="rightAnswer5"></p>
            </div>
            <br />
            
            <div class = "form-group">
                <label for="question6">6. What is the name of the Doctors Planet</label>
                <img src="img/correct.png" id="correct6" style="display: none;"></img>
                <img src="img/wrong.png" id="wrong6" style="display: none;"></img>
                <br />
                <input type="radio" name="question6" value="earth"> Earth<br>
                <input type="radio" name="question6" value="azeroth"> Azeroth<br>
                <input type="radio" name="question6" value="mars"> Mars<br>
                <input type="radio" name="question6" value="xoroth"> Xoroth<br>
                <input type="radio" name="question6" value="gallifrey"> Gallifrey                
                <p id="rightAnswer6"></p>
            </div>
            <br />
            
            
            
            <div id="score">
                <p id="points"></p>
                <p id="result"></p>
                <p id="attempts"></p>
                <p id="avgScore"></p>

            </div>
            <div class="buttons" class = "form-group">
                <input class="btn btn-primary" type="submit" value="Submit Quiz" name="quizSubmit" id="quizSubmit" onclick="checkQuizJS()"/>
                <button class="btn btn-primary" id="startAgain" onclick="resetGame()">Start Again</button>
            </div>
        </div>
        <script type="text/javascript" src="js/functions.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </body>
</html>



