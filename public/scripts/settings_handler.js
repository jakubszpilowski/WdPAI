function editUsername(){
    document.getElementById("edit-user").style.display = "flex";
    document.getElementById("cancel-username").classList.remove("off");
    document.getElementById("edit-username").classList.add("off");
}

function closeUsername(){
    document.getElementById("edit-user").style.display = "none";
    document.getElementById("edit-username").classList.remove("off");
    document.getElementById("cancel-username").classList.add("off");
}

function editEmail(){
    document.getElementById("edit-email").style.display = "flex";
    document.getElementById("cancel-e").classList.remove("off");
    document.getElementById("edit-e").classList.add("off");
}

function closeEmail(){
    document.getElementById("edit-email").style.display = "none";
    document.getElementById("edit-e").classList.remove("off");
    document.getElementById("cancel-e").classList.add("off");
}

function editPassword(){
    document.getElementById("edit-password").style.display = "flex";
    document.getElementById("cancel-p").classList.remove("off");
    document.getElementById("edit-p").classList.add("off");
}

function closePassword(){
    document.getElementById("edit-password").style.display = "none";
    document.getElementById("edit-p").classList.remove("off");
    document.getElementById("cancel-p").classList.add("off");
}

const usernameButton = document.getElementById("apply-username");
const emailButton = document.getElementById("apply-email");
const passwordButton = document.getElementById("apply-password");
const messageDiv = document.getElementById("message-div");
const usernameOut = document.getElementById("user-out");
const emailOut = document.getElementById("email-out")

usernameButton.addEventListener("click", (e) => {
    const newUsername = document.getElementById("username").value;
    if(!validateUsername(newUsername)) {
        e.preventDefault();
    }else {
        changeUsername(newUsername);
    }
});

emailButton.addEventListener("click", (e) => {
    const newEmail = document.getElementById("email").value
    if(!isEmail(newEmail)) {
        e.preventDefault();
    } else {
        changeEmail(newEmail);
    }
})

passwordButton.addEventListener("click", (e) => {
    const newPassword = document.getElementById("password").value
    const newPasswordRepeat = document.getElementById("password-repeat").value

    if(!isPasswordValid(newPassword, newPasswordRepeat)) {
        e.preventDefault();
    } else {
        changePassword(newPassword);
    }
})

function validateUsername(newUsername) {
    if(newUsername.length > 3){
        return true
    } else {
        setError("Username too short")
        return false
    }
}

function isEmail(email){
    if(/\S+@\S+\.\S+/.test(email)){
        return true;
    } else {
        setError("Wrong email form")
        return false
    }
}

function checkPassword(password) {
    if (password.length < 6) {
        setError('Password too short');
        return false;
    } else if (password.length > 30) {
        setError('Password too long');
        return false;
    } else if (!/\d/.test(password)) {
        setError('Password has to include number');
        return false;
    } else if (!/[a-zA-Z]/.test(password)) {
        setError('Password has to include letter');
        return false;
    } else if (/[^a-zA-Z0-9!@#$%^&*()_+]/.test(password)) {
        setError('Password include illegal character');
        return false;
    } else if (!/[A-Z]/.test(password)) {
        setError('Password has to include capital letter');
        return false;
    }
    setSuccess('');
    return true;
}

function isPasswordValid(password, newPassword) {
    if(!checkPassword(password)) {
        return false;
    }

    if(password !== newPassword) {
        setError('Passwords are different')
        return false;
    }
    return true;
}

function loadUsername(userOutput) {
    const userTemplate = document.getElementById("username-template");
    const clone = userTemplate.content.cloneNode(true);
    const usrName = clone.querySelector("span");
    usrName.innerHTML = userOutput;
    usernameOut.appendChild(clone);
}

function loadEmail(emailOutput) {
    const emailTemplate = document.getElementById("email-template");
    const clone = emailTemplate.content.cloneNode(true);
    const newEmail = clone.querySelector("span");
    newEmail.innerHTML = emailOutput;
    emailOut.appendChild(clone);
}

function setSuccess(message){
    messageDiv.setAttribute(`display`, `block`);
    messageDiv.classList.remove("wrong");
    messageDiv.classList.add("success");
    messageDiv.innerHTML = message
}

function setError(message){
    messageDiv.setAttribute(`display`, `block`);
    messageDiv.classList.remove("success");
    messageDiv.classList.add("wrong");
    messageDiv.innerHTML = message;
}

function changeUsername(newUsername){
    fetch("/change_username",
        {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username: newUsername
            })
        }).then((response) => {
            if(response.ok) {
                setSuccess("Username changed")
            } else {
                setError("Username taken")
            }
            return response.json()
    }).then(function (userOutput){
        usernameOut.innerHTML = "";
        loadUsername(userOutput);
    });
    closeUsername();
    document.getElementById("username").value = ''
}

function changeEmail(newEmail) {
    fetch("/change_email",
        {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                email: newEmail
            })
        }).then((response) => {
        if(response.ok) {
            setSuccess("Email changed")
        } else {
            setError("Email already used")
        }
        return response.json()
    }).then(function (emailOutput){
        emailOut.innerHTML = "";
        loadEmail(emailOutput);
    });
    closeEmail();
    document.getElementById("email").value = ''
}

function changePassword(newPassword){
    fetch("/change_password",
        {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                password: newPassword
            })
        }).then((response) => {
        if(response.ok) {
            setSuccess("Password changed")
        }
        return response.json()
    });
    closePassword();
    document.getElementById("password").value = ''
    document.getElementById("password-repeat").value = ''
}
