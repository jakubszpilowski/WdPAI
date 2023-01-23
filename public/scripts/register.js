const form = document.querySelector("form");
const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

form.addEventListener('submit', e => {
    e.preventDefault();
    validateInput();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay =  inputControl.querySelector('.error');
    errorDisplay.innerText = message;
    errorDisplay.setAttribute(`style`, `display: block`);

    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay =  inputControl.querySelector('.error');
    errorDisplay.innerText = '';
    errorDisplay.setAttribute(`style`, `display: none`);

    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}

const validateInput = () => {
    const username = usernameInput.value;

    if (username.length < 3) {
        setError(usernameInput, 'Username is too short');
    } else {
        setSuccess(usernameInput);
    }

    if(emailInput.value === ""){
        setError(emailInput, 'Email is required');
    } else {
        setSuccess(emailInput);
    }

    const message = isPasswordValid(passwordInput.value);

    if(message === ""){
        setSuccess(passwordInput);
    } else {
        setError(passwordInput, message);
    }

};

function markValidation(element, condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function isPasswordValid(password) {
    if (password.length < 6) {
        return 'Password too short';
    } else if (password.length > 30) {
        return 'Password too long';
    } else if (!/\d/.test(password)) {
        return 'Password has to include number';
    } else if (!/[a-zA-Z]/.test(password)) {
        return 'Password has to include letter';
    } else if (/[^a-zA-Z0-9!@#$%^&*()_+]/.test(password)) {
        return 'Password contains illegal character';
    } else if (!/[A-Z]/.test(password)) {
        return 'Password has to include capital letter';
    }
    return '';
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


emailInput.addEventListener('keyup', validateEmail);
passwordInput.addEventListener('keyup', validatePassword);