<?php
if(!isset($_COOKIE['user'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: ${url}/start");
} else {
    setcookie('user', $_COOKIE['user'], time() + (60 * 20), "/");
}

?>

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
        <?php include('messages_div.php') ?>
        <section class="first">
            <?php foreach ($notes as $note): ?>
                <div class="note">
                    <div id=<?=$note->getId(); ?> class="delete">
                        <button id="delete-btn" class="delete-btn"></button>
                    </div>
                    <h1><?=$note->getTitle()?></h1>
                    <h2><?=$note->getDate()?></h2>
                </div>
            <?php endforeach; ?>
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
    <?php include('add_note_form.php') ?>
</body>