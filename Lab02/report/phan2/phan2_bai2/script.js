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

// Function to handle manual input by typing
document.addEventListener('keydown', function(event) {
    var key = event.key;
    // Check if the pressed key is a valid calculator input
    if (/[\d\.+\-*/^()]/.test(key)) {
        event.preventDefault(); // Prevent typing in the input field
        appendToScreen(key); // Append the pressed key to the calculator screen
    } else if (key === 'Enter') {
        event.preventDefault(); // Prevent the default action of the Enter key (submitting a form)
        calculate(); // Perform calculation when Enter key is pressed
    }
});
