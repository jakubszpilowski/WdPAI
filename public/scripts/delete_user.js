const delete_btn = Array.from(document.getElementsByClassName("delete-user"));

const deleteUser = (user, userRow) => {
    fetch("/delete_user", {
       method: "POST",
       headers: {
           "Content-Type": "application/json"
       },
       body: JSON.stringify({
           username: user
       })
   }).then(function (response){
        setSuccess("User deleted successfully")
        userRow.remove()
        return response.json();
   })
}

delete_btn.forEach((button) => {
    const userRow = button.parentElement.parentElement;
    const username = userRow.firstElementChild.textContent
    button.addEventListener("click", () => deleteUser(username, userRow));
})

function setSuccess(message) {
    document.querySelector(".message-div").setAttribute(`display`, `block`);
    document.querySelector(".message-div").innerHTML = message;
}