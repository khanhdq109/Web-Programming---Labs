var lastResult = 0;
var calculated = false;

function appendToScreen(value) {
    if (value == "+" || value == "-" || value == "*" || value == "/" || value == "**") {
        calculated = false;
    }
    if (calculated == true) {
        clearScreen();
        calculated = false;
    }
    var screen = document.getElementById('calculator-screen');
    screen.textContent += value;
}

function deleteNum() {
    var screen = document.getElementById('calculator-screen');
    var currentText = screen.textContent;
    var newText = currentText.slice(0, -1);
    screen.textContent = newText;
}

function clearScreen() {
    var screen = document.getElementById('calculator-screen');
    screen.textContent = '';
}

function calculate() {
    calculated = true;
    var screen = document.getElementById('calculator-screen');
    var result;
    try {
        result = eval(screen.textContent);
        lastResult = result;
    } 
    catch (error) {
        result = 'Error';
    }
    screen.textContent = result;
}

function getAns() {
    appendToScreen(lastResult);
}
