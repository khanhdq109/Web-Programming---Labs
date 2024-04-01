function generateDays() {
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;
    var daySelect = document.getElementById("day");

    // Clear the previous option
    daySelect.innerHTML = "<option value='' disabled selected>Day</option>";

    // Get the number of days in the selected month and year
    var daysInMonth = new Date(year, month, 0).getDate();

    // Generate day options
    for (var i = 1; i <= daysInMonth; i++) {
        var option = document.createElement("option");
        option.value = i;
        option.textContent = i;
        daySelect.appendChild(option)
    }
}

function generateYears() {
    for (var i = 2024; i >= 1950; i--) {
        var yearSelect = document.getElementById("year");

        // Generate year options
        var option = document.createElement("option");
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option)
    }
}

function validate() {
    var firstName = document.getElementById("firstName").value.trim();
    var lastName = document.getElementById("lastName").value.trim();
    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();
    var day = document.getElementById("day").value;
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;
    var gender = document.querySelector('input[name="gender"]:checked');
    var country = document.getElementById("country").value.trim();
    var about = document.getElementById("about").value.trim();

    // First Name
    if (firstName == "") {
        window.alert("Please provide your first name!");
        return false;
    }
    if (firstName.length < 2) {
        window.alert("Your first name is too short!");
        return false;
    }
    if (firstName.length > 30) {
        window.alert("Your first name is too long!");
        return false;
    }

    // Last Name
    if (lastName == "") {
        window.alert("Please provide your last name!");
        return false;
    }
    if (lastName.length < 2) {
        window.alert("Your last name is too short!");
        return false;
    }
    if (lastName.length > 30) {
        window.alert("Your last name is too long!");
        return false;
    }

    // Email
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        alert("Invalid email address")
        return (false)
    }

    // Password
    if (password.length < 2) {
        window.alert("Your password is too weak!");
        return false;
    }
    if (password.length > 30) {
        window.alert("Your password is too long!");
        return false;
    }

    // Birthday
    if (day == "") {
        window.alert("Please select your day of birth!");
        return false;
    }
    if (month == "") {
        window.alert("Please select your month of birth!");
        return false;
    }
    if (year == "") {
        window.alert("Please select your year of birth!");
        return false;
    }

    // Gender
    if (!gender) {
        window.alert("Please select your gender!");
        return false;
    }

    // Country
    if (country == "") {
        window.alert("Please select your country!");
        return false;
    }

    // About
    if (about == "") {
        window.alert("Please tell something about you!");
        return false;
    }

    // Complete
    window.alert("Complete!")
    return true
}

// Event listeners to call the functions when the month or year selection changes
document.getElementById("month").addEventListener("change", generateDays);
document.getElementById("year").addEventListener("change", generateDays);

// Call the functions initially to populate day and year options
generateDays();
generateYears();