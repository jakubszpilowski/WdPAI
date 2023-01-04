const errorMessage = document.getElementsByClassName("error-message")[0];
if(errorMessage.textContent.trim() === ""){
    errorMessage.setAttribute(`style`, `display:none`);
}