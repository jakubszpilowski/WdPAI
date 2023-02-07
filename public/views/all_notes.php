<?php
if(!isset($_COOKIE['user'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: ${url}/start");
} else {
    setcookie('user', $_COOKIE['user'], time() + (60 * 20), "/");
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_all.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_navbar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/add_note.css">
    <script src="/public/scripts/nav.js" defer></script>
    <script src="/public/scripts/add.js" defer></script>
    <title>All</title>
</head>
<body>
    <?php include('nav_header.php') ?>
    <?php include('messages_div.php') ?>
    <div class="container flex">
        <?php foreach ($notes as $note): ?>
                <div class="note">
                    <div class="content flex">
                        <h1><?=$note->getTitle()?></h1>
                        <h2><?=$note->getDetails()?></h2>
                        <h3><?=$note->getDate()?></h3>
                    </div>
                    <div id=<?=$note->getId(); ?> class="delete">
                        <button id="delete-btn" class="delete-btn"></button>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
    <div class="button-container">
        <button class="add-button" onclick="openAdd()"></button>
    </div>
    <?php include('add_note_form.php') ?>
</body>
</html>