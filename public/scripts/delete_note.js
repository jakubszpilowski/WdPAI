const deleteButtons = Array.from(document.getElementsByClassName("delete-btn"));
const messageDiv = document.getElementById("message-div");
const noteDiv = document.getElementById("note");

const deleteNote = (noteId, noteTitle) => {
    fetch("/delete_note", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id_note: noteId
        })
    }).then(function (response){
        setSuccess("Note: '" + noteTitle + "' deleted successfully")
        return response.json();
    }).then(function (notes) {
        loadNotes(notes);
    })
}

deleteButtons.forEach((button) => {
    const noteId = parseInt(button.parentElement.id);
    const noteTitle = button.parentElement.parentElement.querySelector("h1").textContent;
    button.addEventListener("click", () => deleteNote(noteId, noteTitle));
})

function setSuccess(message){
    messageDiv.innerHTML = "";
    messageDiv.classList.add("success");
    messageDiv.innerHTML = message;
}

function loadNotes(notes){
    const notesSection = document.getElementById("note-section");
    notesSection.innerHTML = notes.map(note => {
        return `
            <div id="note" class="note">
                 <div id="${note.id}" class="delete">
                     <button id="delete-btn" class="delete-btn"></button>
                 </div>
                 <h1>${note.title}</h1>
                 <h2>${note.dat}</h2>
            </div>
        `;
    }).join('')
}