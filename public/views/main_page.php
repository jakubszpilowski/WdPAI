<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_navbar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/add_note.css">
    <script src="/public/scripts/nav.js" defer></script>
    <script src="/public/scripts/add.js" defer></script>
    <title>Main page</title>
</head>
<body>
        <?php include('nav_header.php') ?>

    <div class="container">
        <p>Latest notes</p>
        <?php foreach ($notes as $note): ?>
        <section class="first">
            <div class="note">
                <h1><?=$note->getTitle()?></h1>
                <h2><?=$note->getDate()?></h2>
            </div>
        </section>
        <?php endforeach; ?>
        <section class="second">
            <a href="all" class="action-button">
                <strong>ALL</strong>
                <img src="/public/img/arrow_right_org.svg">
            </a>
            <button class="action-button" onclick="openAdd()">
                <strong>ADD</strong>
                <img src="/public/img/add.svg">
            </button>
        </section>
    </div>
    <div class="form-popup" id="addNote">
        <form action="/action_page.php" class="form-container" method="POST">
            <div class="exit">
                <span class="add-text">Add new note</span>
                <button class="exit-btn" onclick="closeAdd()"></button>
            </div>
            <div class="title-date flex">
                <label for="title" class="title">
                    <input type="text" placeholder="title" name="title" required>
                </label>
                <label for="date" class="date-input">
                    <input type="date" name="note-date" value="2023-01-01" min="2023-01-01" max="2024-01-01" required>
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
</body>