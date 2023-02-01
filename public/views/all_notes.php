<?php
if(!isset($_COOKIE['user'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: ${url}/index");
} else {
    setcookie('user', $_COOKIE['user'], time() + (60 * 20), "/");
}

?>

!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_all.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_navbar.css">
    <script src="/public/scripts/nav.js" defer></script>
    <title>All</title>
</head>
<body>
    <?php include('nav_header.php') ?>
</body>
</html>