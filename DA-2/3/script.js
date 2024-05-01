// This is just a placeholder example since the project doesn't require client-side JavaScript functionality.
// You can add client-side JavaScript code here if needed.

// Example function to greet the user
function greetUser() {
    var name = prompt("What is your name?");
    if (name !== null && name !== "") {
        alert("Hello, " + name + "! Welcome to our COVID Tracker.");
    } else {
        alert("Hello! Welcome to our COVID Tracker.");
    }
}

// Call the function when the page is loaded
window.onload = greetUser;
