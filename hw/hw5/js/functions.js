var answerField1 = document.querySelector('#question1');
var answerField2 = document.querySelector('#question2'); 
var answerField3 = document.querySelector('#question3'); 

var rightAnswer1 = document.querySelector('#rightAnswer1');
var rightAnswer2 = document.querySelector('#rightAnswer2'); 
var rightAnswer3 = document.querySelector('#rightAnswer3'); 
var rightAnswer4 = document.querySelector('#rightAnswer4');
var rightAnswer5 = document.querySelector('#rightAnswer5');
var rightAnswer6 = document.querySelector('#rightAnswer6');

var quizSubmit = document.querySelector('#quizSubmit');
var startAgain = document.querySelector('#startAgain');
var displayPoints = document.querySelector('#points');
var result = document.querySelector('#result');


var correctImages = [];
var wrongImages = [];

for(var i = 1; i <= 6; i++) {
    correctImages[i - 1] = document.getElementById('correct' + i);
}

for(var i = 1; i <= 6; i++) {
    wrongImages[i - 1] = document.getElementById('wrong' + i);
}

startAgain.style.display = 'none';


var points = 0;

function checkQuizJS() {
    var answer1 = Number(answerField1.value);
    var answer2 = String(answerField2.value);
    var answer3 = String(answerField3.value);
    var answer4 = $('input[name=question4]:checked').val();
    var answer5 = $("#question5").val();
    var answer6 = $('input[name=question6]:checked').val();
    
    
    
    console.log(answer1);
    console.log(answer2);
    console.log(answer3);
    console.log(answer4);
    console.log(answer5);
    console.log(answer6);

    if(answer1 == 12) {
        points = points + 1;
        correctImages[0].style.display = 'inline';
        rightAnswer1.style.color = 'green';
        rightAnswer1.innerHTML = '12 was correct!';
    } else {
        wrongImages[0].style.display = 'inline';
        rightAnswer1.style.color = 'red';
        rightAnswer1.innerHTML = 'Wrong! The right Answer was 12';
    }
    
    if(answer2 == "Peter Capaldi") {
        correctImages[1].style.display = 'inline';
        points = points + 1;
        rightAnswer2.style.color = 'green';
        rightAnswer2.innerHTML = 'Peter Capaldi correct!';
    } else {
        wrongImages[1].style.display = 'inline';
        rightAnswer2.style.color = 'red';
        rightAnswer2.innerHTML = 'Wrong! The right answer was Peter Capaldi';
    }
    
    if(answer3 == "dannyPink") {
        correctImages[2].style.display = 'inline';
        points = points + 1;
        rightAnswer3.style.color = 'green';
        rightAnswer3.innerHTML = 'Danny Pink was correct!';
    } else {
        wrongImages[2].style.display = 'inline';
        rightAnswer3.style.color = 'red';
        rightAnswer3.innerHTML = 'Wrong! the right answer was Danny Pink';
    }
    
    if(answer4 == "arrakoa") {
        correctImages[3].style.display = 'inline';
        points = points + 1;
        rightAnswer4.style.color = 'green';
        rightAnswer4.innerHTML = 'The Arrakoa was correct!';
    } else {
        wrongImages[3].style.display = 'inline';
        rightAnswer4.style.color = 'red';
        rightAnswer4.innerHTML = 'Wrong! the right answer was the Arrakoa';
    }
    
    if(answer5 == "Rose Tyler") {
        correctImages[4].style.display = 'inline';
        points = points + 1;
        rightAnswer5.style.color = 'green';
        rightAnswer5.innerHTML = 'Rose Tyler was Correct!';
    } else {
        wrongImages[4].style.display = 'inline';
        rightAnswer5.style.color = 'red';
        rightAnswer5.innerHTML = 'Wrong! the right answer was Rose Tyler';
    }
    
    if(answer6 == "gallifrey") {
        correctImages[5].style.display = 'inline';
        points = points + 1;
        rightAnswer6.style.color = 'green';
        rightAnswer6.innerHTML = 'Gallifrey was correct!';
    } else {
        wrongImages[5].style.display = 'inline';
        rightAnswer6.style.color = 'red';
        rightAnswer6.innerHTML = 'Wrong! the right answer was Gallifrey';
    }
    
    countPoints();
}

function countPoints() {
        displayPoints.innerHTML = 'You got ' + points + ' Points!';
    if(points >= 5) {
        result.style.color = 'green';
        result.innerHTML = 'Congratulations you got more than 80% right';
    } else {
        result.style.color = 'red';
        result.innerHTML = 'Im sorry! You didnt get enough points! Try again!';
    }
    
    runAjax();
    setGameOver();
}
            
function setGameOver() {
    $('input[type="text"]').prop('disabled', true);
    $('input[type="radio"]').prop('disabled', true);
    $('#question3').prop('disabled', true);
    quizSubmit.disabled = true;
    startAgain.style.display = 'inline';
}

function resetGame() {
    points = 0;
    var resetParas = document.querySelectorAll('.resultParas p');
    for (var i = 0 ; i < resetParas.length ; i++) {
        resetParas[i].textContent = '';
    }

    startAgain.style.display = 'none';
        
    for(var i = 1; i <= 6; i++) {
        correctImages[i - 1].style.display = 'none';
    }
    
    for(var i = 1; i <= 6; i++) {
        wrongImages[i - 1].style.display = 'none';
    }
    
    rightAnswer1.innerHTML = '';
    rightAnswer2.innerHTML = '';
    rightAnswer3.innerHTML = '';
    rightAnswer4.innerHTML = '';
    rightAnswer5.innerHTML = '';
    rightAnswer6.innerHTML = '';
    
    
    $('input[type="text"]').prop('disabled', false);
    $('input[type="radio"]').prop('disabled', false);
    $('#question3').prop('disabled', false);
    
    $('input[type="text"]').val('');
    $('#question3').prop('selectedIndex',0);
    $('input[type=radio]').attr('checked',false);

    displayPoints.innerHTML = '';  
    result.style.color = 'white';
    result.innerHTML = '';            
    quizSubmit.disabled = false;
    answerField1.focus();
}



function runAjax(){
     $.ajax({
        type: "GET",
        url: "api.php",
        dataType: "json",
        data: {"score": points},
        success:function(data) {
            //console.log(data.avg);
            //console.log(data.count);
            $('#avgScore').html("Your average score is: " + data.avg);
            $('#attempts').html("Total Quiz attempts: " + data.count);
        }
        
        
    })
}

