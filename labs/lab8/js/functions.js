var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

var randomNumber = Math.floor(Math.random() * 99) + 1;
var guesses = document.querySelector('#guesses');
var lastResult = document.querySelector('#lastResult');
var lowOrHi = document.querySelector('#lowOrHi');

var guessSubmit = document.querySelector('.guessSubmit');
var guessField = document.querySelector('.guessField');

var victories = 0;
var losses = 0;

var directions = document.querySelector("#directions");


var guessCount = 1;
var resetButton = document.querySelector('#reset');
resetButton.style.display = 'none';
guessField.focus();


console.log(victories);
console.log(losses);
console.log(randomNumber);

alert(randomNumber);

document.getElementById("victories").innerHTML = victories;
document.getElementById("losses").innerHTML = losses;


function checkGuess() {
    directions.style.height = "450px";
    var userGuess = Number(guessField.value);    
    if(isNaN(userGuess)) {
        alert("Please enter a number");
        return;
    }
    if(userGuess > 99) {
        alert("Number har to be less than 100");
        return;
    } else if (userGuess < 0) {
        alert("Number needs to be more than 0");
        return;
    }
    
    if (guessCount === 1) {
        guesses.innerHTML = 'Previous guesses: ';
    }
    
    guesses.innerHTML += userGuess + ' ';
    
    if (userGuess === randomNumber) {
        lastResult.innerHTML = 'Congratulations! You got it right!';
        lastResult.style.backgroundColor = 'green';
        lowOrHi.innerHTML = '';
        victories++;
        $("#losses").html(losses);
        $("#victories").html(victories);
        setGameOver();
    } else if (guessCount === 7) {
        lastResult.innerHTML = 'Sorry, you lost!';
        losses++;
        $("#losses").html(losses);
        $("#victories").html(victories);
        setGameOver();
    } else {
        lastResult.innerHTML = 'Wrong!';
        lastResult.style.backgroundColor = 'red';
        if(userGuess < randomNumber) {
            $("#lowOrHi").html("Last gues was to low")
        } else if(userGuess > randomNumber) {
            $("#lowOrHi").html("Last gues was too high!")
        }
    }
    
    guessCount++;
    guessField.value = '';
    guessField.focus();
}

guessSubmit.addEventListener('click', checkGuess);



function setGameOver() {
    guessField.disabled = true;
    guessSubmit.disabled = true;
    resetButton.style.display = 'inline';
    resetButton.addEventListener('click', resetGame);
}

function resetGame() {
    guessCount = 1;
    directions.style.height = "450px";
    var resetParas = document.querySelectorAll('.resultParas p');
    for (var i = 0 ; i < resetParas.length ; i++) {
        resetParas[i].textContent = '';
    }

    resetButton.style.display = 'none';
    
    guessField.disabled = false;
    guessSubmit.disabled = false;
    guessField.value = '';
    guessField.focus();
    
    lastResult.style.backgroundColor = 'white';
    
    randomNumber = Math.floor(Math.random() * 99) + 1;
}