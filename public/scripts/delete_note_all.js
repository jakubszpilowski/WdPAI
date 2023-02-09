const deleteButtons = Array.from(document.getElementsByClassName("delete-btn"));
const messageDiv = document.getElementById("message-div");

const deleteNote = (noteId, noteToDelete, noteTitle) => {
    fetch("/delete_notes", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id_note: noteId
        })
    }).then(function (response){
        setSuccess("Note: '" + noteTitle + "' deleted successfully")
        noteToDelete.remove()
        return response.json();
    })
}

deleteButtons.forEach((button) => {
    const noteToDelete = button.parentElement.parentElement;
    const noteId = parseInt(button.parentElement.id);
    const noteTitle = button.parentElement.parentElement.firstElementChild.querySelector("h1").textContent;
    button.addEventListener("click", () => deleteNote(noteId, noteToDelete, noteTitle));
})

function setSuccess(message){
    messageDiv.innerHTML = "";
    messageDiv.classList.add("success");
    messageDiv.innerHTML = message;
}