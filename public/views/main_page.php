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
    <header class="primary-header flex">
        <div class="flex">
            <img src="/public/img/logo.svg" class="logo">
        </div>

        <button class="mobile-nav-toggle" aria-controls="navigation-bar" aria-expanded="false">
            <span class="btn">
                Menu
            </span>
        </button>

        <nav id="navigation-bar" data-visible="false" class="navigation-bar flex">
            <ul id="navigation" class="navigation list flex">
                <li class="nav-button active">
                    <a href="home">
                        <img src="/public/img/home_wh.svg" class="icon">
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-button">
                    <a href="week">
                        <img src="/public/img/week_org.svg" class="icon">
                        <span>Week</span>
                    </a>
                </li>
                <li class="nav-button">
                    <a href="all">
                        <img src="/public/img/all_org.svg" class="icon">
                        <span>All</span>
                    </a>
                </li>
            </ul>
            <ul class="settings list flex">
                <li>
                    <a href="settings">
                        <img src="/public/img/profile.svg" class="enable">
                        <img src="/public/img/profile_org.svg" class="disable">
                        <span class="disable">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="start">
                        <img src="/public/img/logout.svg" class="enable">
                        <img src="/public/img/logout_org.svg" class="disable">
                        <span class="disable">Log out</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
        
    <div class="container">
        <p>Latest notes</p>
         <section class="first">
            <div class="note">
                    
            </div>
            <div class="note">
                    
            </div>
            <div class="note">
                    
            </div>
        </section>
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