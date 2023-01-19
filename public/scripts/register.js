const form = document.querySelector("form");

const usernameInput = form.querySelector('input[name="username"]');
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');
const messages = form.querySelector('div.error-messages');

function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

function isUsernameCorrect(){
    return usernameInput.value.length > 3;
}

function markValidation(element, condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function isPasswordValid(password){
    if(password.length < 6) {
        messages.innerHTML = "Password too short"
        return false;
    } else if (password.length > 30) {
        messages.innerHTML = "Password too long"
        return false;
    } else if (!/\d/.test(password)) {
        messages.innerHTML = "Password has to include number"
        return false;
    } else if (!/[a-zA-Z]/.test(password)) {
        messages.innerHTML = "Password has to include letter"
        return false;
    } else if (/[^a-zA-Z0-9!@#$%^&*()_+]/.test(password)) {
        messages.innerHTML = "Password contains illegal character"
        return false;
    } else if (!/[A-Z]/.test(password)) {
        messages.innerHTML = "Password has to include capital letter"
        return false;
    }

    messages.innerHTML = ""
    return true;
}

function validateEmail(){
    setTimeout(function () {
        markValidation(emailInput, isEmail(emailInput.value))
    },
        1000);
}

function validatePassword() {
    setTimeout(function () {
        const cond = isPasswordValid(passwordInput.value);
        markValidation(passwordInput, cond)
    },
        1000);
}

function isFormValid() {
    if(isEmail(emailInput.value)
        && isUsernameCorrect()
        && isPasswordValid(passwordInput.value)) {
        return true;
    } else {
        messages.innerHTML = "Input not valid!"
        return false;
    }
}

emailInput.addEventListener('keyup', validateEmail);
passwordInput.addEventListener('keyup', validatePassword);