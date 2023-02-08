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
