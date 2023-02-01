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
    <link rel="stylesheet" type="text/css" href="/public/css/style_settings.css">
    <script src="/public/scripts/nav.js" defer></script>
    <title>Settings</title>
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
            <ul class="settings list flex">
                <li>
                    <a href="#">
                        <img src="/public/img/cross.svg" class="enable">
                        <img src="/public/img/cross_org.svg" class="disable">
                        <span class="disable">Exit</span>
                    </a>
                </li>
                <li>
                    <form class="logout-form" action="logout" method="POST">
                        <button>
                            <span class="disable">Log out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <ul class="list contents flex">
            <li class="info flex">
                <span class="user flex">
                    Username
                </span>
                <button class="edit-btn">
                    Edit
                </button>
            </li>
            <li class="info flex">
                <span class="user flex">
                    e-mail
                </span>
                <button class="edit-btn">
                    Edit
                </button>
            </li>
            <li class="info flex">
                <span class="user flex">
                    Password
                </span>
                <button class="edit-btn">
                    Edit
                </button>
            </li>
        </ul>
        <div class="ctn flex">
            <button class="apply-btn flex">
                Apply
            </button>
        </div>
    </div> 
</body>