<div class="form-popup form-sticky" id="addNote">
    <form action="add_note_in_all" class="form-container" method="POST">
        <div class="exit">
            <span class="add-text">Add new note</span>
            <button class="exit-btn" onclick="closeAdd()"></button>
        </div>
        <div class="title-date flex">
            <label for="title" class="title">
                <input name="title" type="text" placeholder="title" required>
            </label>
            <label for="date" class="date-input">
                <input type="date" name="date" value="2023-01-01" min="2023-01-01" max="2024-01-01" required>
            </label>
        </div>
        <label for="content" class="text-area">
            <textarea name="details" placeholder="details"></textarea>
        </label>
        <div class="submit-btn-div">
            <button type="submit" class="btn"></button>
        </div>
    </form>
</div>

