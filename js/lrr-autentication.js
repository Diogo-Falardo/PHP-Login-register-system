////////////////////////////////////////////////////////// //
// This Script Handles The Login/Register/Recovery Forms   //
// Script made by Diogo Falardo 18/03/2024                 //
////////////////////////////////////////////////////////// //

// This Script Will Receive the data
// Manipulate the data
// Encrypt the data? 

const error_msg = document.getElementById('error');

// anything NOT alphanumeric, correct length
const isValidUsername = /^[0-9A-Za-z]{6,16}$/;

// at least one number, at least one letter, correct length
const isValidPassword = /^(?=.*?[0-9])(?=.*?[A-Za-z]).{8,32}$/;

// at least one each of a number, uppercase letter, lowercase letter, and non-alphanumeric, correct length
const isStrongPassword = /^(?=.*?[0-9])(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[^0-9A-Za-z]).{8,32}$/;

// Email Pattern
const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

// function to validate username
function validateUsername(username) {
    return isValidUsername.test(username);
}

function validatePassword(password) {
    return isValidPassword.test(password);
}

function validateEmail(email) {
    return emailPattern.test(email);
}

// # REGISTER

document.getElementById("register-form").addEventListener("submit", function(event){
    // GET [capture] the data 
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;


    // console.log("Username:", username);
    // console.log("Password:", password);
    // console.log("Email:", email);

    let messages = []


    if (!validateUsername(username)){
        messages.push('Username must be alphanumeric and between 6 and 16 characters long');
    }

    if (!validatePassword(password)){
        messages.push('Password must be at least 8 characters long and contain at least one number and one letter');
    }

    if (!validateEmail(email)){
        messages.push('Invalid email address');
    }


    if (messages.length > 0){
        event.preventDefault();
        error_msg.innerText = messages.join(', ');
    }
});

// # LOGIN

document.getElementById("login-form").addEventListener("submit", function (event){
    var username = document.getElementById("username-log").value;
    var password = document.getElementById("password-log").value;

    let messages = [] 

    if (!validateUsername(username)){
        messages.push('Username incorrect!')
    }

    if (!validatePassword(password)){
        messages.push('Password incorrect!')
    }

    if (messages.length > 0){
        event.preventDefault();
        error_msg.innerText = messages.join(', ');
    }
});

// # RECOVERY

document.getElementById("recovery-form").addEventListener("submit", function (event){

    var email = document.getElementById("email-rec").value;

    let messages = [] 

    if (!validateEmail(email)){
        messages.push('Invalid email address');
    }


    if (messages.length > 0){
        event.preventDefault();
        error_msg.innerText = messages.join(', ');
    }
});